<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\ProductCategory;
use Cart;

class ShopComponent extends Component
{
    use WithPagination;

    public $sorting;
    public $pagesize;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
    }
    
    public function render()
    {
        return view('livewire.shop-component')->layout('layouts.guest');
    }
}
