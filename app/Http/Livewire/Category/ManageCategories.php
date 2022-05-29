<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;

class ManageCategories extends Component
{
    public $category='';
    public $status='';
    public $category_id='';

    public function render()
    {
        return view('livewire.category.manage-categories');
    }

    public function save()
    {
        $categoryData=$this->validate([
            'category' => 'required|max:50',
            'status' =>'required|numeric|integer'
        ]);

        Category::create($categoryData);

        return view('livewire.category.manage-categories');
    }


    public function update()
    {
        $category=Category::find($this->category_id);

        $category->update(
            ['category'=>$this->category,
             'status'=> $this->status
        ]);
        return view('livewire.category.manage-categories');
    }

    public function destroy()
    {
        $category=Category::find($this->category_id);

        $category->delete();

        return view('livewire.category.manage-categories');
    }
}
