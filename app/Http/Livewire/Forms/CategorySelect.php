<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;
use App\Models\Category;

class CategorySelect extends Component
{
    public $categories;
    public $category_id =0 ;

    public function mount()
    {
        $this->categories = Category::get();
    }

    public function render()
    {
        return view('livewire.forms.category-select',compact($this->categories));
    }

    public function updatedCategoryId()
    {
        $this->emitUp('category_selected', $this->category_id);
    }

}
