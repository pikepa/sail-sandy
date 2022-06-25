<?php

namespace App\Http\Livewire\Home;

use App\Models\Post;
use Livewire\Component;

class MainBody extends Component
{   public $posts;

    public function mount()
    {
        $this->posts = Post::limit(6)->orderBy('published_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.home.main-body');
    }
}
