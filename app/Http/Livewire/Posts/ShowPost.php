<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;



class ShowPost extends Component
{
    public $post = '';

    public function mount($id)
    {
        $this->post = Post::find($id);

    }
    
    public function render()
    {
        return view('livewire.posts.show-post');
    }
}
