<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Livewire\Component;

class UserOrderItemComponent extends Component
{

    public $order;
    public $products;

    public function mount($orderId)
    {
        $this->order = Order::whereId($orderId)->get()->first();
//        $this->products = $this->order->order_product;
//        dd($this->products);
    }

    public function render()
    {
        return view('livewire.user.user-order-item-component');
    }
}
