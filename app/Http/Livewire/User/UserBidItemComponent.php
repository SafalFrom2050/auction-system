<?php

namespace App\Http\Livewire\User;

use App\Models\Bid;
use Livewire\Component;

class UserBidItemComponent extends Component
{

    public $bid;

    public function mount($bidId)
    {
        $this->bid = Bid::whereId($bidId)->get()->first();
    }

    public function cancelBid()
    {
        $this->emit('cancelBid');
    }

    public function render()
    {
        return view('livewire.user.user-bid-item-component');
    }
}
