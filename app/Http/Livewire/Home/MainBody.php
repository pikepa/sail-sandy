<?php

namespace App\Http\Livewire\Home;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class MainBody extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.home.main-body', [
            'posts' => Post::published()->orderBy('published_at', 'desc')
            ->limit(12)
            ->paginate(6),
        ]);
    }
}
