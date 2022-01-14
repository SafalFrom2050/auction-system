<?php

namespace App\Http\Livewire\Admin;

use App\Models\Auction;
use App\Models\Item;
use Livewire\Component;

class AdminItemsListComponent extends Component
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
    public function showList(){
        $this->showForm = false;
        $this->items = Item::orderBy('updated_at', 'desc')->withMax('bids', 'price')->get();
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

    public function toggleApprove($id){
        $item = Item::whereId($id)->get()->first();
        $newStatus = !$item->is_approved;


        $item->update(['is_approved' => $newStatus]);

        $this->showList();
        $this->message = 'Item updated!';
    }

    public function render()
    {
        return view('livewire.admin.admin-items-list-component');
    }
}
