<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;

class ManagePosts extends Component
{
    public $posts;

    public $uuid;
    public $title;
    public $slug;
    public $body;
    public $category_id;
    public $author_id;
    public $cover_image;
    public $meta_description;
    public $published_at = null;
    public $featured =0;
    public $showAddForm = false;
    public $showEditForm = false;
    public $showTable = true;
    public $categories;

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
        'uuid'   => '',
    
    ];

    public function mount()
    {
        $this->categories=Category::get();
        $this->posts = Post::with('author')->orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
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

    public function edit($id)
    {
        $editing = Post::findOrFail($id);
        $this->title = $editing->title;
        $this->body = $editing->body;
        $this->meta_description = $editing->meta_description;
        
        $this->showEditForm();

      //  return view('livewire.posts.manage-posts');

    }

    public function save()
    {
        $data= $this->validate();

        Post::create($data);

        $this->showTable();
        return view('livewire.posts.manage-posts');
    }
}
