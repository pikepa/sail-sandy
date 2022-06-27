<?php

namespace App\Http\Livewire\Home;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class MainBody extends Component
{   
    use WithPagination;
    

    public function mount()
    {
     //   $this->posts = Post::inRandomOrder()
                // ->limit(12)
                // ->paginate(6);
    }

    public function render()
    {
        return view('livewire.home.main-body', [
            'posts' => Post::orderBy('published_at','desc')
            ->limit(12)
            ->paginate(6),
        ]);
    }
}
