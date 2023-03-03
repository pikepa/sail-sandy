<?php

namespace App\Http\Livewire\Home;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class MainBody extends Component
{
    use WithPagination;

    public $channel;

    public function mount($channel)
    {
        $this->channel = $channel;
    }

    public function render()
    {
        return view('livewire.home.main-body', [
            'posts' => Post::published()
            ->where('channel_id', $this->channel->id)
            ->orderBy('published_at', 'desc')
            ->limit(12)
            ->paginate(4),
        ]);
    }
}
