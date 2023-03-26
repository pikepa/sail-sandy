<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class DashStandardPage extends Component
{
    public $show = 'posts';

    public function render()
    {
        return view('livewire.pages.dash-standard-page');
    }

    public function setShow($item)
    {
        $this->show = $item;
    }
}
