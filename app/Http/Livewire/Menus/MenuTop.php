<?php

namespace App\Http\Livewire\Menus;

use Livewire\Component;
use App\Models\Category;

class MenuTop extends Component
{

    public function render()
    {
        return view('livewire.menus.menu-top',[
            'categories' => Category::where('type','main')->get(),
            ]);
    }
}
