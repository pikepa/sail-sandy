<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class ManagePosts extends Component
{
    use WithFileUploads;

    public $posts;

    public $post_id;

    public $title;

    public $slug;

    public $body;

    public $is_in_vault = false;

    public $category_id;

    public $author_id;

    public $cover_image = null;

    public $meta_description;

    public $published_at = 'Draft';

    public $showAddForm = 0;

    public $showEditForm = 0;

    public $showTable = 1;

    public $categories;

    public $selectedCategory;

    public $post;

    public $showAlert = false;

    public $newImage;

    protected $rules =
    [
        'title'   => 'required|max:250',
        'slug'    => 'required',
        'body'   => 'required|min:20',
        'meta_description'   => 'required|max:300',
        'is_in_vault'   => 'required',
        'author_id'   => 'required',
        'category_id'   => 'required',
        'published_at'   => '',
        'cover_image' => 'required|url',
    ];

    public function mount()
    {
        $this->author_id = auth()->user()->id;
    }

    public function render()
    {
        $this->posts = Post::with('author')->orderBy('created_at', 'desc')->get();

        return view('livewire.posts.manage-posts');
    }

    public function updatedTitle($value)
    {
        $this->slug = Str::slug($value);
    }

    public function updatedNewImage()
    {
        $this->validate(['newImage' => 'image|max:5000']);
        $this->cover_image = $this->newImage->temporaryUrl();
    }

    public function showAddForm()
    {
        $this->showTable = false;
        $this->showEditForm = false;
        $this->showAddForm = true;
    }

    public function showEditForm()
    {
        $this->showTable = false;
        $this->showEditForm = true;
        $this->showAddForm = false;
    }

    public function showTable()
    {
        $this->showTable = true;
        $this->showEditForm = false;
        $this->showAddForm = false;
    }

    // listen from event from CategorySelect

    protected $listeners = [
        'category_selected',
    ];

    public function category_selected($category_id)
    {
        $this->category_id = $category_id;
    }

    public function create()
    {
        $this->showAddForm();
    }

    public function save()
    {
        $this->storeFile();

        $data = $this->validate();

        Post::create($data);

        // dd($this->newImage->getClientOriginalName());
        // dd(env('AWS_URL').'/'.$this->newImage->getRealPath());

        $this->resetExcept('author_id');
        $this->showTable();

        session()->flash('message', 'Post Successfully added.');
        session()->flash('alertType', 'success');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $post->id;
        $this->title = $post->title;
        $this->cover_image = $post->cover_image;
        $this->slug = $post->slug;
        $this->body = $post->body;
        $this->is_in_vault = $post->is_in_vault;
        $this->category_id = $post->category_id;
        $this->selectedCategory = $post->category_id;
        $this->author_id = $post->author_id;
        $this->published_at = $post->published_at;
        $this->meta_description = $post->meta_description;

        $this->showEditForm();
    }

    public function update($id)
    {
        $this->storeFile();

        $data = $this->validate();
        $post = Post::findOrFail($id);

        $post->update($data);

        $this->resetExcept('author_id');
        $this->showTable();

        session()->flash('message', 'Post Successfully Updated.');
        session()->flash('alertType', 'success');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        $this->showAlert = true;

        session()->flash('message', ' Post Successfully deleted.');
        session()->flash('alertType', 'success');

        //return redirect('/posts');
    }

    public function cancel()
    {
        $this->resetBanner();
        $this->showTable();
    }

    public function resetBanner()
    {
        $this->showAlert = true;

        session()->flash('message', '');
        session()->flash('alertType', '');
    }

    public function storeFile()
    {
        if ($this->newImage) {
            $filename = $this->newImage->store('/featured', 'featured');
            $this->cover_image = env('AWS_URL').'/'.$filename;
        } else {
            return;
        }
    }
}
