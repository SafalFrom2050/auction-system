<?php

namespace App\Http\Livewire\Seller;

use App\Models\Item;
use Livewire\Component;

class SellerItemsListComponent extends Component
{
    protected $listeners = ['added', 'updated'];
    public $message;

    public $showForm = false;
    public $itemId;

    public $items;

    public function mount()
    {
        $this->showList();
    }

    public function added(){
        $this->showForm = false;
        $this->message = 'Item added!';
        $this->showList();
    }

    public function updated(){
        $this->showForm = false;
        $this->message = 'Item updated!';
        $this->showList();
    }

    public function newItem(){
        $this->showForm = true;
        $this->itemId = null;
    }

    public function editItem($id){
        $this->showForm = true;
        $this->itemId = $id;
    }

    public function deleteItem($id){
        Item::find($id)->delete();
        $this->showList();
        $this->message = 'Item removed!';
    }

    public function showList(){
        $this->showForm = false;
        $this->items = auth()->user()->items;
    }

    public function render()
    {
        return view('livewire.seller.seller-items-list-component');
    }
}
