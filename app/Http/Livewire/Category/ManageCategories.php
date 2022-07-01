<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class ManageCategories extends Component
{
    public $name = '';

    public $slug = '';

    public $status = false;

    public $type = '';

    public $parent_id = '';

    public $category_id = '';

    public $categories;

    public $showTable = true;

    public $showEditForm = false;

    public $showAddForm = false;

    public $showAlert=false;

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

    //  Switching Forms on Master Screen

    public function showAddForm()
    {
        $this->showTable = false;
        $this->showEditForm = false;
        $this->showAddForm = true;
    }

    public function showEditForm()
    {
        $this->showTable = false;
        $this->showEditForm = true;
        $this->showAddForm = false;
    }

    public function showTable()
    {
        $this->showTable = true;
        $this->showEditForm = false;
        $this->showAddForm = false;
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function create()
    {
        $this->showAddForm();
    }

    public function save()
    {
        $categoryData = $this->validate([
            'name' => 'required|max:50',
            'slug' => 'required',
            'type' => 'required',
            'status' => 'required|boolean',
            'parent_id' => '',
        ]);

        Category::create($categoryData);

        $this->showTable();
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);

        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->status= $category->status;
        $this->type = $category->type;
        $this->parent_id = $category->parent_id;
        $this->category_id = $category->id;
        $this->showEditForm();

    }

    public function update($id)
    {
        $category = Category::find($id);
        $categoryData = $this->validate([
            'name' => 'required|max:50',
            'slug' => 'required',
            'type' => 'required',
            'status' => 'required |boolean',
            'parent_id' => '',
        ]);

        $category->update($categoryData);

        $this->showTable();

    }

    public function delete($id)
    {
        $category = Category::find($id);

        $category->delete();

        return view('livewire.category.manage-categories');
    }

    public function cancel()
    {
        $this->resetBanner();
        $this->showTable();
    }

    public function resetBanner()
    {
        $this->showAlert = false;

        session()->flash('message', '');
        session()->flash('alertType', '');
    }
}
