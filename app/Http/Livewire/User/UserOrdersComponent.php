<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Livewire\Component;

class UserOrdersComponent extends Component
{

    public $orders;
    public $orderId;

    public function mount()
    {
        $this->showList();
    }

    public function setOrderItem($id){
        $this->orderId = $id;
    }

    public function showList(){
        $this->orders = Order::where('user_id', auth()->id())->get();
        unset($this->orderId);
    }

    public function cancelOrder(){

    }

    public function render()
    {
        return view('livewire.user.user-orders-component');
    }
}
