<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class ManageCategories extends Component
{
    public $name = '';

    public $slug = '';

    public $status = '';

    public $type = '';

    public $category_id = '';

    public $categories;

    public Category $editing;

    // public function rules()
    // {
    //     return [
    //         'editing.category' => 'required|min:3',
    //         'editing.type' => 'required',
    //         'editing.status' => 'required',
    //         // |in:'.collect(Category::STATUSES)->keys()->implode(','),
    //     ,
    //     ];
    // }

    public function mount()
    {
        $this->editing = Category::make(['type' => 'gen']);
    }

    public function render()
    {
        $this->categories = Category::orderBy('name', 'asc')->get();

        return view('livewire.category.manage-categories');
    }

    public function edit(Category $category)
    {
        $this->editing = $category;

        $this->showEditModal = true;
    }

    // public function save()
    // {
    //     $this->validate();

    //     $this->editing->save();

    //     $this->showEditModal = false;
    // }

    public function save()
    {
        $categoryData = $this->validate([
            'name' => 'required|max:50',
            'slug' => 'required',
            'status' => 'required|numeric|integer',
        ]);

        Category::create($categoryData);

        return view('livewire.category.manage-categories');
    }

    public function update()
    {
        $category = Category::find($this->category_id);

        $category->update(
            [
                'name' => $this->name,
                'status' => $this->status,
            ]
        );

        return view('livewire.category.manage-categories');
    }

    public function destroy()
    {
        $category = Category::find($this->category_id);

        $category->delete();

        return view('livewire.category.manage-categories');
    }
}
