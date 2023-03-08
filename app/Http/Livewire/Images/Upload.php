<?php

namespace App\Http\Livewire\Images;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class Upload extends Component
{
    use WithFileUploads;

    public $photo;

    public $post_id;

    public function mount($post_id)
    {
        $this->post_id = $post_id;
    }

    public function render()
    {
        return view('livewire.images.upload');
    }

    public function save()
    {
        $this->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $post = Post::find($this->post_id);
        $post->addMedia($this->photo->getRealPath())
            ->usingName($this->photo->getClientOriginalName())
            ->toMediaCollection('photos', 's3');

        $this->photo = '';

        $this->emitUp('photoAdded');
    }
}
