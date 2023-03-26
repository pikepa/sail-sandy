<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowPost extends Component
{

    public $post;
    public $post_id;
    public $showEditForm = false;

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
        $this->post_id = $this->post->id;
    }

    public function render()
    {
        return view('livewire.posts.show-post');
    }

    public function editPost()
    {
        // return redirect()->to('/dashboard/posts/'. $this->post->id );   
    }
}
