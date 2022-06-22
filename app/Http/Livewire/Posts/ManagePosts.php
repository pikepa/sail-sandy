<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ManagePosts extends Component
{
    public $posts;
    public $post_id;
    public $title;
    public $slug;
    public $body;
    public $category_id;
    public $author_id;
    public $cover_image = 'Https://google.com';
    public $meta_description;
    public $published_at = 'Draft';
    public $showAddForm = 0;
    public $showEditForm = 0;
    public $showTable = 1;  
    public $categories;
    public $selectedCategory;
    public $post;
    public $showAlert = false;

    protected $rules  = 
    [
        'title'   => 'required|max:250',
        'slug'    => 'required',
        'body'   => 'required|min:20',
        'meta_description'   => 'required|max:250',
        'author_id'   => 'required',
        'category_id'   => 'required',
        'published_at'   => '',
        'cover_image' => 'required | url',
    
    ];

    public function mount()
    {
        $this->author_id = auth()->user()->id;
        $this->categories=Category::get();
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

    public function showAddForm()
    {
        $this->showTable = false;
        $this->showEditForm = false;
        $this->showAddForm = true;
    }
    public function showEditForm()
    {
        $this->showTable = false;
        $this->showEditForm =true;
        $this->showAddForm = false;
    }
    public function showTable()
    {
        $this->showTable = true;
        $this->showEditForm =false;
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

        $data= $this->validate();
        Post::create($data);

        $this->resetExcept('author_id');
        $this->showTable();

        session()->flash('message', 'Post Successfully added.');
        session()->flash('alertType', 'success');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id=$post->id;
        $this->title = $post->title;
        $this->cover_image = $post->cover_image;
        $this->slug = $post->slug;
        $this->body = $post->body;
        $this->category_id = $post->category_id;
        $this->selectedCategory = $post->category_id;
        $this->author_id = $post->author_id;
        $this->published_at = $post->published_at;
        $this->meta_description = $post->meta_description;
        
        $this->showEditForm();

    }
    public function update($id)
    {
        $post = Post::findOrFail($id);

        $data= $this->validate();

        $post->update($data);

        $this->resetExcept('author_id');
        $this->showTable();

        session()->flash('message', 'Post Successfully Updated.');
        session()->flash('alertType', 'success');
    }




    public function delete($id)
    {
        $post=Post::findOrFail($id);
        $post->delete();
        $this->showAlert=true;

        session()->flash('message',' Post Successfully deleted.');
        session()->flash('alertType', 'success');

        //return redirect('/posts');

    }

    

    public function resetBanner()
    {
        $this->showAlert=true;

        session()->flash('message', '');
        session()->flash('alertType', '');

        //return redirect('/posts');

    }




}
