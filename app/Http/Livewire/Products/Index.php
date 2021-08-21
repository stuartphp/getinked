<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductUnit;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\WithPagination;

class Index extends Component
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
    public $catagories;
    public $units;

    public function rules(){
        $rules = [
            'item.code'=>['required',  Rule::unique('products', 'code')->ignore($this->primaryKey)],
            'item.name' => 'required',
            'item.slug' => ['required', Rule::unique('products', 'slug')->ignore($this->primaryKey)],
            'item.short_description'=>'required',
            'item.description'=>'required',
            'item.keywords'=>'required',
            'item.on_hand'=>'required',
            'item.product_category_id'=>'required',
            'item.cost_price'=>'required',
            'item.is_feature'=>'boolean',
            'item.is_service'=>'boolean',
            'item.is_active' =>'boolean',
            'item.product_unit_id'=>'required',
            'item.deductable'=>'required',
            'item.retail_price'=>['required', 'numeric'],
            'item.special_price'=>'numeric',
            'item.special_from'=>'date',
            'item.special_to'=>'date',
        ];

        return $rules;
    }

    protected $validationAttributes = [
        'item.code' => 'code',
        'item.name' => 'name',
        'item.slug' => 'slug',
        'item.short_description' => 'short description',
        'item.description' => 'description',
        'item.keywords' => 'keyword',
        'item.on_hand' => 'on hand',
        'item.product_category_id' => 'category',
        'item.cost_price' => 'cost price',
        'item.product_unit_id'=>'unit',
        'item.deductable'=>'deductable',
        'item.retail_price'=>'retail price',
        'item.special_price'=>'special price',
        'item.special_from'=>'special from',
        'item.special_to'=>'special to',
    ];

    public function mount()
    {
        $this->catagories = ProductCategory::orderBy('parent_id')->orderBy('name')->where('is_active', 1)->get();
        $this->units = ProductUnit::orderBy('name')->pluck('name', 'id')->toArray();
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
        return Product::query();
    }

    public function render()
    {
        $data = $this->query()
        ->with('category')
            ->when($this->searchTerm, function($q){
                $q->where('name', 'like', '%'.$this->searchTerm.'%');
            })
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate($this->pageSize);
           // dd($data);
        return view('livewire.products.index', ['data'=>$data]);
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
        $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Record Deleted']);
    }

    public function showCreateForm()
    {
        $this->confirmingItemEdition = true;
        $this->formTitle = 'Create Record';
        $this->primaryKey=0;
        $this->resetErrorBag();
        $this->reset(['item']);
    }

    public function showEditForm(Product $item)
    {
        $this->resetErrorBag();
        $this->formTitle = 'Edit Record';
        $this->item = $item;
        $this->primaryKey = $this->item->id;
        $this->confirmingItemEdition = true;
    }

    public function copyItemForm(Product $item)
    {
        $this->resetErrorBag();
        $this->formTitle = 'Create Record';
        $this->item = $item;
        $this->item['code']='';
        $this->item['special_price']=NULL;
        $this->item['special_from']= NULL;
        $this->item['special_to']= NULL;
        $this->confirmingItemEdition = true;
    }

    public function saveItem()
    {
        $this->validate();

        if($this->primaryKey>0){
            if($this->item['special_price'] == '')
            {
                $this->item['special_price'] = NULL;
                $this->item['special_from'] = NULL;
                $this->item['special_to'] = NULL;
            }
            $this->item->save();
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Updated']);
        }else{
            Product::create([
                'code'=>$this->item['code'],
                'name'=>$this->item['name'],
                'slug'=>$this->item['slug'],
                'short_description'=>$this->item['short_description'],
                'description'=>$this->item['description'],
                'keywords'=>$this->item['keywords'],
                'on_hand'=>$this->item['on_hand'],
                'product_category_id'=>$this->item['product_category_id'],
                'cost_price'=>$this->item['cost_price'],
                'is_feature'=>isset($this->item['is_feature']) ? 1:0,
                'is_service'=>isset($this->item['is_service']) ? 1:0,
                'is_active'=>isset($this->item['is_active'])? 1:0,
                'product_unit_id'=>$this->item['product_unit_id'],
                'deductable'=>$this->item['deductable'],
                'retail_price'=>$this->item['retail_price'],
                'special_price'=>isset($this->item['special_price'])? $this->item['special_price'] : NULL,
                'special_from'=>isset($this->item['special_from']) ? $this->item['special_from']: NULL,
                'special_to'=>isset($this->item['special_to']) ? $this->item['special_to']: NULL,
            ]);
            $this->dispatchBrowserEvent('alert', ['type' => 'success',  'message' => 'Successfully Created']);
        }
        $this->confirmingItemEdition = false;
        $this->primaryKey = '';

    }
}
