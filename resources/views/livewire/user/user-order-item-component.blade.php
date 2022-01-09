<div class="order-item-wrapper" wire:loading.remove>
    <div class="orders-overview flex-row">
        <div class="item flex-column">
            ORDER NUMBER:
            <strong>{{ $order->id }}</strong>
        </div>

        <hr class="separator-vertical"/>

        <div class="item flex-column">
            STATUS:
            <strong>{{ $order->status }}</strong>
        </div>

        <hr class="separator-vertical"/>

        <div class="item flex-column">
            DATE:
            <strong>{{ $order->created_at->diffForHumans() }}</strong>
        </div>

        <hr class="separator-vertical"/>

        <div class="item flex-column">
            NAME:
            <strong>{{ $order->user->name }}</strong>
        </div>

    </div>


    <div class="order-details flex-column">
        <h3 class="heading">ORDER DETAILS</h3>
        <div class="order-list">
            <div class="products flex-column">
                <h3 class="heading">Product</h3>

                @foreach($order->order_product as $product)
                    <div class="product-item">
                        <p>{{ $product->product_name }} <strong>x {{ $product->quantity }}</strong></p>
                        <span>{{ $product->price }}</span>
                    </div>
                @endforeach

            </div>
            <div class="detail-row"><strong>Subtotal:</strong><span>{{ $order->amount }}</span></div>
            <hr class="separator-horizontal"/>

            <div class="detail-row"><strong>Tax:</strong><span>{{ $order->tax_amount }}</span></div>
            <hr class="separator-horizontal"/>

            <div class="detail-row"><strong>Shipping:</strong><span>{{ $order->shipping_amount }}</span></div>
            <hr class="separator-horizontal"/>

            <div class="detail-row"><strong>Payment
                    Method:</strong><span>CHAINAA</span></div>
            <hr class="separator-horizontal"/>

            <div class="detail-row"><strong>Total:</strong><span>{{ $order->total_amount }}</span></div>
        </div>
        <div class="flex-row justify-end mt-2">
            <button class="button-outline cancel">Cancel Order</button>
        </div>
    </div>
</div>
