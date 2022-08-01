<?php

namespace App\Http\Livewire\Links;

use App\Models\Link;
use Livewire\Component;

class ManageLinks extends Component
{
    public $links =[];

    public function render()
    {
   //     $this->links = Link::with('author')->orderBy('created_at', 'desc')->get();

        return view('livewire.links.manage-links');
    }
}
