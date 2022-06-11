<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class ManagePosts extends Component
{
    public $posts;
    public $title;
    public $slug;
    public $body;
    public $cover_img;
    public $meta_description;
    public $published_at = null;
    public $featured =0;

    protected $rules  = 
    [
        'title'   => 'required|max:250',
        'slug'    => 'required',
        'body'   => 'required|min:20',
        'cover_img'   => 'required',
        'meta_description'   => 'required',
        'published_at'   => '',
        'featured'   => '',
    
    ];

    public function mount()
    {
        $this->posts = Post::with('author')->orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.posts.manage-posts');
    }

    public function save()
    {
        $this->validate();

        return view('livewire.posts.manage-posts');
    }
}
