<section>
    <h2 class="title-text">
        <img
            src="/svgs/circle-fill.svg"
            class="w-4 h-4 mb-2"
            alt="circle icon"
        />
        MY ORDERS

        @if($orderId)
            <x-common.dashboard.back-button/>
        @endif
        <x-common.spinner/>
    </h2>

    @if($orderId)
        <div>
            <livewire:user.user-order-item-component :orderId="$orderId"/>
        </div>
    @else

        <div class="order-cards" wire:loading.remove>

            @foreach($orders as $order)
                <x-cards.user-order-card
                    :key="$order->id"
                    :id="$order->id"
                    status="{{$order->status}}" orderNumber="{{ $order->id }}"
                    :details="[
                        'Name: ' . $order->user->id ,
                        'Quantity: CHAINA',
                        'Payment method: CHAINA',
                        'Amount: ' . $order->amount,
                        'Date: ' . ($order->created_at ? $order->created_at->diffForHumans() : '')
                    ]"/>
            @endforeach

            @if(count($orders) == 0)
                <div class="no-orders flex-column align-center">
                    <img
                        src="/svgs/circle-fill.svg"
                        class="w-4 h-4 mb-4 mt-2"
                        alt="circle icon"
                    />
                    <h3>You have no orders</h3>
                    <p>Make a wish</p>

                    <a href="/">
                    <button class="button-fill">START SHOPPING</button>
                    </a>
                </div>
            @endif
        </div>
    @endif

</section>
