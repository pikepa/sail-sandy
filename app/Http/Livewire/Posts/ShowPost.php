<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowPost extends Component
{
    public $post;

    public function mount($slug)
    {
        if (Auth::check()) {
            $this->post = Post::where('slug', $slug)->first();
        } else {
            $this->post = Post::published()->where('slug', $slug)->first();
            if ($this->post == null) {
                return redirect('/login')->with('status', 'Not Authorized!');
            }
        }
    }

    public function render()
    {
        return view('livewire.posts.show-post');
    }
}
