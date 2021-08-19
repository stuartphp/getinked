<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductCategory;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class Categories extends Component
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
            'item.slug' => ['required', Rule::unique('product_categories', 'slug')->ignore($this->primaryKey)],
            'item.parent_id' => 'numeric',
            'item.is_active' => 'boolean',
        ];
    }
    protected $validationAttributes = [
        'item.name' => ' name',
        'item.slug' => ' slug',
    ];

    public function mount()
    {
        $this->catagories = ProductCategory::orderBy('parent_id')->orderBy('name')->where('is_active', 1)->get();
    }
    public function updatedSearchTerm()
    {
        $this->resetPage();
    }
    public function updatedPageSize()
    {
        $this->resetPage();
    }

    public function updated($item,$val)
    {

        if($item=='item.name')
        {
            $this->item['slug'] = Str::slug($val);
        }
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
        return ProductCategory::query();
    }
    public function render()
    {
        $data = $this->query()
            ->when($this->searchTerm, function($q){
                $q->where('name', 'like', '%'.$this->searchTerm.'%');
            })
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate($this->pageSize);
        return view('livewire.products.categories', ['data'=>$data]);
    }
    public function showDeleteForm($id)
    {
        $this->confirmingItemDeletion = true;
        $this->primaryKey = $id;
    }

    public function deleteItem()
    {
        ProductCategory::destroy($this->primaryKey);
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

    public function showEditForm(ProductCategory $item)
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
            ProductCategory::create([
                'name'=>$this->item['name'],
                'parent_id'=>$this->item['parent_id'],
                'slug'=>$this->item['slug'],
                'is_active'=>$this->item['is_active']
            ]);
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Created']);
        }
        $this->confirmingItemEdition = false;
        $this->primaryKey = '';

    }
}
