<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class ManagePosts extends Component
{
    public $posts;
    public $post_id;
    public $uuid = '';
    public $title;
    public $slug;
    public $body;
    public $category_id;
    public $author_id ;
    public $cover_image;
    public $meta_description;
    public $published_at = null;
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
        'cover_image'   => 'required',
        'meta_description'   => 'required',
        'author_id'   => 'required',
        'category_id'   => 'required',
        'published_at'   => '',
        'uuid'   => 'required',
    
    ];

    public function mount()
    {
        $this->categories=Category::get();
    }

    public function render()
    {
        $this->posts = Post::with('author')->orderBy('created_at', 'desc')->get();
        return view('livewire.posts.manage-posts');
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
        'closeAlert',
    ];
    
    public function closeAlert()
    {
        $this->showAlert = 'false';

        return view('livewire.posts.manage-posts');
    }
    
    public function category_selected($category_id)
    {
        $this->category_id = $category_id;
    }

    public function create()
    {
        $this->showAddForm();

       // return view('livewire.posts.manage-posts');

    }


    public function save()
    {
        $this->author_id = auth()->user()->id;
        $this->uuid = (string) Str::uuid();
        $this->cover_image = "https://google.com";
        $this->slug = "this-is-a-test";

        $data= $this->validate();
        Post::create($data);

        $this->showTable();

        session()->put(['alertType' => 'success', 'message' => 'Post Successfully Added.']);

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
        $this->published_at = $post->published_at;
        $this->meta_description = $post->meta_description;
        
        $this->showEditForm();

    }
    public function update($id)
    {
        $post = Post::findOrFail($id);
        $this->author_id = $post->author_id;
        $this->uuid = $post->uuid;
        $this->cover_image = $post->cover_image;
        $this->slug = Str::slug($this->title);

        $data= $this->validate();
        $post->update($data);

        $this->reset();
        $this->showTable();

        session()->put(['alertType' => 'success', 'message' => 'Post Successfully Updated.']);

    }




    public function delete($id)
    {
        $post=Post::findOrFail($id);
        $post->delete();
        $this->showAlert=true;

        session()->put(['alertType' => 'success', 'message' => 'Post Successfully Deleted.']);


    }



}
