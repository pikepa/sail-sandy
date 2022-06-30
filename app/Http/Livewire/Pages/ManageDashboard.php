<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class ManageDashboard extends Component
{
    public $vDash = false;
    public $vPost = true;
    public $vPage = false;
    public $vCategory = false;

    public function toPosts()
    {
        $this->vPost = true;
        $this->vDash = false;
        $this->vPage = false;
        $this->vCategory = false;
    }
    public function toDash()
    {
        $this->vPost = false;
        $this->vDash = true;
        $this->vPage = false;
        $this->vCategory = false;
    }

    public function render()
    {
        return view('livewire.pages.manage-dashboard');
    }
}
