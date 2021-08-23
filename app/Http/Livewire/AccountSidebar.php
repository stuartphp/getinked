<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AccountSidebar extends Component
{
    public $menu;

    public function mount($menu)
    {
        $this->menu = $menu;
    }
    public function render()
    {
        return view('livewire.account-sidebar');
    }
}
