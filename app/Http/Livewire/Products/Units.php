<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductUnit;

class Units extends Component
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
    public $catagories;
    public $formTitle = 'Create Record';

    public function rules(){
        return [
            'item.name' => 'required',
        ];
    }
    protected $validationAttributes = [
        'item.name' => ' name',
    ];

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }
    public function updatedPageSize()
    {
        $this->resetPage();
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
        return ProductUnit::query();
    }
    public function render()
    {
        $data = $this->query()
            ->when($this->searchTerm, function($q){
                $q->where('name', 'like', '%'.$this->searchTerm.'%');
            })
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate($this->pageSize);
        return view('livewire.products.units', ['data'=>$data]);
    }
    public function showDeleteForm($id)
    {
        $this->confirmingItemDeletion = true;
        $this->primaryKey = $id;
    }

    public function deleteItem()
    {
        ProductUnit::destroy($this->primaryKey);
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

    public function showEditForm(ProductUnit $item)
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
            ProductUnit::create([
                'name'=>$this->item['name'],
            ]);
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Created']);
        }
        $this->confirmingItemEdition = false;
        $this->primaryKey = '';

    }
}
