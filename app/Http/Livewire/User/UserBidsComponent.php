<?php

namespace App\Http\Livewire\User;

use App\Models\Bid;
use Livewire\Component;
use function Psy\sh;

class UserBidsComponent extends Component
{

    public $bids;
    public $bidId;

    protected $listeners = ['cancelBid'];

    public function mount()
    {
        $this->showList();
    }

    public function setBidId($id){
        $this->bidId = $id;
    }

    public function showList(){
        $this->bids = Bid::where('user_id', auth()->id())->get();
        unset($this->bidId);
    }

    public function cancelBid($bidId=null){
        if (!$bidId) {
            $bidId = $this->bidId;
        }

        Bid::where('id', $bidId)->first()->delete();
        $this->showList();
    }

    public function render()
    {
        return view('livewire.user.user-bids-component');
    }
}
