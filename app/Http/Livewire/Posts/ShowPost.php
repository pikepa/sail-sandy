<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class ShowPost extends Component
{
    public $post;


    public function mount($slug)
    {
        $this->post = Post::where('slug',$slug)->first();
    }

    public function render()
    {
        return view('livewire.posts.show-post');
    }
}
