<?php

namespace App\Http\Livewire\Menus;

use App\Models\Category;
use Livewire\Component;

class MenuTop extends Component
{
    public function render()
    {
        return view('livewire.menus.menu-top', [
            'categories' => Category::where('type', 'main')->get(),
        ]);
    }
}
