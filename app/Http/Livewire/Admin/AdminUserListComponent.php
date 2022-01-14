<?php

namespace App\Http\Livewire\Admin;

use App\Models\Item;
use App\Models\User;
use Livewire\Component;

class AdminUserListComponent extends Component
{
    public $message;

    public $users;

    public function mount()
    {
        $this->showList();
    }

    public function showList(){
        $this->users = User::orderBy('updated_at', 'desc')->get();
    }

    public function deleteUser($id){
        User::find($id)->delete();
        $this->showList();
        $this->message = 'User removed!';
    }


    public function toggleApprove($id){
        $user = User::whereId($id)->get()->first();
        $newStatus = !$user->is_approved;

        $user->update(['is_approved' => $newStatus]);
        $this->showList();
        $this->message = 'User updated!';
    }


    public function render()
    {
        return view('livewire.admin.admin-user-list-component');
    }
}
