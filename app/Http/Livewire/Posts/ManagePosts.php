<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class ManagePosts extends Component
{
    public $posts;

    public $uuid = '';
    public $title;
    public $slug;
    public $body;
    public $category_id;
    public $author_id ;
    public $cover_image;
    public $meta_description;
    public $published_at = null;
    public $featured =0;
    public $showAddForm = 0;
    public $showEditForm = 0;
    public $showTable = 1;  
    public $categories;
    public $selectedCategory;

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
        'featured'   => '',
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
        'category_selected'
    ];
    
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
        return view('livewire.posts.manage-posts');
    }

    public function edit($id)
    {
        $editing = Post::findOrFail($id);
        $this->title = $editing->title;
        $this->body = $editing->body;
        $this->category_id = $editing->category_id;
        $this->selectedCategory = $editing->category_id;
        $this->published_at = $editing->published_at;
        $this->featured = $editing->featured;
        $this->meta_description = $editing->meta_description;
        
        $this->showEditForm();

    }




    public function delete($id)
    {
        $post=Post::findOrFail($id);
        $post->delete();

        return view('livewire.posts.manage-posts');

    }



}
