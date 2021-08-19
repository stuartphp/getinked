<?php

namespace App\Http\Livewire\UserManager;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Permission;

class Permissions extends Component
{
    use WithPagination;

    public $sortBy = 'title';
    public $searchTerm='';
    public $sortAsc = true;
    public $pageSize = 10;
    protected $listeners = [
        'showDeleteForm',
        'showEditForm',
    ];
    public $confirmingItemDeletion = false;
    public $primaryKey;
    public $confirmingItemCreation = false;
    public $confirmingItemEdition = false;
    public $item;
    public $formTitle = 'Create Record';

    protected $rules = [
        'item.title' => 'required',

    ];
    protected $validationAttributes = [
        'item.title' => ' title is required'
    ];

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }
    public function updatedPageSize()
    {
        $this->resetPage();
    }

    public function render()
    {
        $data= $this->query()

            ->when($this->searchTerm, function($q){
            $q->where('title', 'like', '%'.$this->searchTerm.'%');
        })
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate($this->pageSize);
        return view('livewire.user-manager.permissions', ['data'=>$data]);
    }

    public function sortBy($field)
    {
        if ($field == $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        }
        $this->sortBy = $field;
    }

    public function query()
    {
        return Permission::query();
    }
    public function showDeleteForm($id)
    {
        $this->confirmingItemDeletion = true;
        $this->primaryKey = $id;
    }

    public function deleteItem()
    {
        Permission::destroy($this->primaryKey);
        $this->confirmingItemDeletion = false;
        $this->primaryKey = '';
        $this->reset(['item']);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Deleted']);
    }

    public function showCreateForm()
    {
        $this->confirmingItemEdition = true;
        $this->formTitle = 'Create Record';
        $this->resetErrorBag();
        $this->reset(['item']);
    }

    public function showEditForm(Permission $item)
    {
        $this->resetErrorBag();
        $this->formTitle = 'Edit Record';
        $this->item = $item;
        $this->primaryKey = $this->item->id;
        $this->confirmingItemEdition = true;
    }

    public function saveItem()
    {
        $this->validate();

        if($this->primaryKey>0){
            $this->item->save();
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Updated']);
        }else{
            Permission::create([
                'title' => $this->item['title']
            ]);
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Created']);
        }
        $this->confirmingItemEdition = false;
        $this->primaryKey = '';

    }

}
