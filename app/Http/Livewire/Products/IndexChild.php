<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductCategory;

class IndexChild extends Component
{
    protected $listeners = [
        'showDeleteForm',
        'showCreateForm',
        'showEditForm',
    ];
    public $confirmingItemDeletion = false;
    public $primaryKey;
    public $confirmingItemCreation = false;
    public $confirmingItemEdition = false;
    public $item;
    public $catagories;
    public $message ='';
    public $parent = 'products.index';

    protected $rules = [
        'item.code'=>'required',
        'item.name'=>'required',
        'item.slug'=>'required|unique:products,slug',
        'item.short_description'=>'required',
        'item.description'=>'required',
        'item.keywords'=>'required',
        'item.on_hand'=>'required',
        'item.product_category_id'=>'required',
        'item.cost_price'=>'required',
        'item.is_feature'=>'boolean',
        'item.is_service'=>'boolean',
        'item.is_active'=>'boolean',
    ];
    protected $validationAttributes = [
        'item.code' => ' code is required',
        'item.name' => ' name is required',
        'item.slug' => ' slug is required',
        'item.short_description' => ' short description is required',
        'item.description' => ' description is required',
        'item.keywords' => ' keyword is required',
        'item.on_hand' => ' on hand is required',
        'item.product_category_id' => ' category is required',
        'item.cost_price' => ' cost price is required',
    ];

    public function mount()
    {
        $this->catagories = ProductCategory::orderBy('parent_id')->orderBy('name')->where('is_active', 1)->get();
    }
    public function showDeleteForm($id)
    {
        $this->confirmingItemDeletion = true;
        $this->primaryKey = $id;
    }

    public function deleteItem()
    {
        Product::destroy($this->primaryKey);
        $this->confirmingItemDeletion = false;
        $this->primaryKey = '';
        $this->reset(['item']);
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Deleted']);
        $this->emitTo($this->parent, 'refresh');
    }

    public function showCreateForm()
    {
        $this->confirmingItemCreation = true;
        $this->resetErrorBag();
        $this->reset(['item']);
    }

    public function createItem()
    {
        dd($this->validate());
        Product::create([
            'title' => $this->item['title']
        ]);
        $this->confirmingItemCreation = false;
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Created']);
        $this->emitTo($this->parent, 'refresh');
    }

    public function showEditForm(Product $item)
    {
        $this->resetErrorBag();
        $this->item = $item;
        $this->confirmingItemEdition = true;
    }

    public function editItem()
    {
        $this->validate();
        $this->item->save();
        $this->confirmingItemEdition = false;
        $this->primaryKey = '';
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Updated']);
        $this->emitTo($this->parent, 'refresh');
    }
    public function render()
    {
        return view('livewire.products.index-child');
    }

}
