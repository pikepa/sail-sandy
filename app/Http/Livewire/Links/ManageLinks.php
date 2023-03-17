<?php

namespace App\Http\Livewire\Links;

use App\Models\Link;
use Livewire\Component;

class ManageLinks extends Component
{
    public $links = [];

    public $link_id;

    public $title = '';

    public $url = '';

    public $owner_id;

    public $position = 'RIGHT';

    public $status = 1;

    public $sort;

    public $showTable = true;

    public $showEditForm = false;

    public $showAddForm = false;

    public $showAlert = false;

    protected $rules = [
        'title' => 'required|min:6|max:50',
        'url' => 'required|url',
        'position' => "required|in:RIGHT,CENTER,LEFT",
        'owner_id' => 'required|integer',
        'status' => 'required|boolean',
        'sort' => 'required|integer',
    ];
    /*
    Set the owner Id to the current User
    */
    public function mount()
    {
        $this->owner_id = auth()->user()->id;
    }

    public function render()
    {
        $this->links = Link::with('owner')->orderBy('position')->orderBy('sort', 'asc')->get();
        return view('livewire.links.manage-links');
    }
    
    public function updatedPosition($value)
    {
        $this->position = strtoupper($value);
    }


    /*
      Switching Forms on Master Screen
    */
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

    public function create()
    {
        $this->showAddForm();
    }

    public function save()
    {
        $linkData = $this->validate();

        Link::create($linkData);

        $this->resetExcept(['owner_id']);

        $this->showTable();

        session()->flash('message', 'Link Successfully added.');
        session()->flash('alertType', 'success');
    }


    public function edit($id)
    {
        $link = Link::findOrFail($id);

        $this->title = $link->title;
        $this->url = $link->url;
        $this->sort = $link->sort;
        $this->position = $link->position;
        $this->status = $link->status;
        $this->owner_id = $link->owner_id;
        $this->link_id = $link->id;

        $this->showEditForm();
    }

    public function update($id)
    {
        $link = Link::find($id);
        $linkData = $this->validate();

        $link->update($linkData);

        $this->resetExcept(['owner_id']);
        $this->showTable();

        session()->flash('message', 'Link Successfully updated.');
        session()->flash('alertType', 'success');
    }

    public function delete($id)
    {
        $link = Link::find($id);

        $link->delete();

        $this->reset();
        $this->showTable();

        session()->flash('message', 'Link Successfully deleted.');
        session()->flash('alertType', 'success');
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
