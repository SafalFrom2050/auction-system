<?php

namespace App\Http\Livewire\User;

use App\Models\UserAddress;
use Livewire\Component;

class UserAddressBookComponent extends Component
{

    protected $listeners = ['addressAdded', 'addressUpdated'];
    public $message;

    public $showForm = false;
    public $addressId;

    public $addresses;

    public function mount()
    {
        $this->showList();
    }

    public function addressAdded(){
        $this->showForm = false;
        $this->message = 'Address added!';
        $this->showList();
    }

    public function addressUpdated(){
        $this->showForm = false;
        $this->message = 'Address updated!';
        $this->showList();
    }

    public function newAddress(){
        $this->showForm = true;
        $this->addressId = null;
    }

    public function editAddress($id){
        $this->showForm = true;
        $this->addressId = $id;
    }

    public function deleteAddress($id){

        $userAddress = UserAddress::find($id);
        if ($userAddress->isDefault) {
            $this->message = [
              'content' => 'Cannot delete default address!',
              'type' => 'fail'
            ];
            return;
        }
        $userAddress->delete();

        $this->addresses = $this->addresses->reject(function ($value, $key) use($id) {
            return $value->id == $id;
        });

        $this->message = 'Address removed!';
    }

    public function showList(){
        $this->showForm = false;
        $this->addresses = UserAddress::orderBy('isDefault', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.user.user-address-book-component');
    }
}
