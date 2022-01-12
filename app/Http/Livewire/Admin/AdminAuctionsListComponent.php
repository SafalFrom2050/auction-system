<?php

namespace App\Http\Livewire\Admin;

use App\Models\Auction;
use Livewire\Component;

class AdminAuctionsListComponent extends Component
{
    protected $listeners = ['added', 'updated'];
    public $message;

    public $showForm = false;
    public $auctionId;

    public $auctions;

    public function mount()
    {
        $this->showList();
    }

    public function showList(){
        $this->showForm = false;
        $this->auctions = Auction::orderBy('created_at', 'desc')->get();
    }

    public function added(){
        $this->showForm = false;
        $this->message = 'Auction added!';
        $this->showList();
    }

    public function updated(){
        $this->showForm = false;
        $this->message = 'Auction updated!';
        $this->showList();
    }

    public function newAuction(){
        $this->showForm = true;
        $this->auctionId = null;
    }

    public function editAuction($id){
        $this->auctionId = $id;
        $this->showForm = true;
    }

    public function deleteAuction($id){
        Auction::find($id)->delete();
        $this->showList();
        $this->message = 'Auction removed!';
    }

    public function toggleStatus($id){
        $auction = Auction::whereId($id)->get()->first();
        $newStatus = $auction->status == 'closed' ? 'open' : 'closed';

        $auction->update(['status' => $newStatus]);

        $this->showList();
        $this->message = 'Auction updated!';
    }

    public function render()
    {
        return view('livewire.admin.admin-auctions-list-component');
    }
}
