<?php

namespace App\Http\Livewire\UserManager;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $sortBy = 'name';
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
        'item.name' => 'required',
        'item.email' => 'required',
    ];
    protected $validationAttributes = [
        'item.name' => ' name is required',
        'item.email' => ' email is required',
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
        $data = $this->query()
            ->with('roles')
            ->when($this->searchTerm, function($q){
                $q->where('name', 'like', '%'.$this->searchTerm.'%')
                    ->orWhere('email', 'like', '%'.$this->searchTerm.'%');
            })
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate($this->pageSize);

        return view('livewire.user-manager.users', ['data'=>$data]);
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
        return User::query();
    }
    public function showDeleteForm($id)
    {
        $this->confirmingItemDeletion = true;
        $this->primaryKey = $id;
    }

    public function deleteItem()
    {
        User::destroy($this->primaryKey);
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

    public function showEditForm(User $item)
    {
        $this->resetErrorBag();
        $this->formTitle = 'Edit Record';
        $this->item = $item;
        $this->confirmingItemEdition = true;
    }

    public function saveItem()
    {
        $this->validate();
        if($this->item->id){
            $this->item->save();
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Updated']);
        }else{
            Users::create([
                'title' => $this->item['title']
            ]);
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Created']);
        }
        $this->confirmingItemEdition = false;
        $this->primaryKey = '';

    }
}
