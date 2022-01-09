<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserNavComponent extends Component
{
    public $navLink;
    public $username;

    protected $listeners = ['userDetailsChanged'];

    public function mount($navLink = ''){

        $this->username = auth()->user()->name;

        if($navLink){
            $this->navLink = $navLink;
            return;
        }
        $this->navLink = "dashboard";
    }

    public function userDetailsChanged()
    {
        $this->username = auth()->user()->name;
    }

    public function setActiveNav($navLink)
    {
        $this->navLink = $navLink;
    }

    public function render()
    {
        return view('livewire.user.user-nav-component');
    }
}
