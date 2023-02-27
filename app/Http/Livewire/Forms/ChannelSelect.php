<?php

namespace App\Http\Livewire\Forms;

use App\Models\Channel;
use Livewire\Component;

class ChannelSelect extends Component
{
    public $channels;

    public $chan_id;

    public $channel_id = 0;

    public function mount($chan_id = null)
    {
        if ($chan_id != null) {
            $this->channel_id = $chan_id;
        }
        $this->channels = Channel::where('status', '1')->get();
    }

    public function render()
    {
        return view('livewire.forms.channel-select', $this->channels);
    }

    public function updatedChannelId()
    {
        $this->emitUp('channel_selected', $this->channel_id);
    }
}
