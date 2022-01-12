<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminNavComponent extends Component
{
    public $navLink;
    public $username;

    protected $listeners = ['userDetailsChanged'];

    public function mount($navLink = ''){
        $this->username = auth('admin')->user()->name;

        if($navLink){
            $this->navLink = $navLink;
            return;
        }
        $this->navLink = "dashboard";
    }

    public function userDetailsChanged()
    {
        $this->username = auth('admin')->user()->name;
    }

    public function setActiveNav($navLink)
    {
        $this->navLink = $navLink;
    }

    public function render()
    {
        return view('livewire.admin.admin-nav-component');
    }
}
