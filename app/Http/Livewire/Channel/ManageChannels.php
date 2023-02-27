<?php

namespace App\Http\Livewire\Channel;

use Livewire\Component;

class ManageChannels extends Component
{
    public $channels= [];
    public function render()
    {
        return view('livewire.channel.manage-channels');
    }
}
