<div class="order-item-wrapper" wire:loading.remove>
    <div class="orders-overview flex-row">
        <div class="item flex-column">
            LOT NUMBER:
            <strong>{{ $bid->item->lot_no }}</strong>
        </div>

        <hr class="separator-vertical"/>

        <div class="item flex-column">
            STATUS:
            <strong>{{ $bid->status }}</strong>
        </div>

        <hr class="separator-vertical"/>

        <div class="item flex-column">
            DATE:
            <strong>{{ $bid->created_at->diffForHumans() }}</strong>
        </div>

        <hr class="separator-vertical"/>

        <div class="item flex-column">
            NAME:
            <strong>{{ $bid->user->name }}</strong>
        </div>

    </div>


    <div class="order-details flex-column">
        <h3 class="heading">BID DETAILS</h3>
        <div class="order-list">

            <div class="detail-row"><strong>Piece Title:</strong><span>{{$bid->item->title}}</span></div>
            <hr class="separator-horizontal"/>

            <div class="detail-row"><span>{{$bid->item->description}}</span></div>
            <hr class="separator-horizontal"/>

            <div class="detail-row"><strong>Subtotal:</strong><span>Rs. {{ number_format($bid->price, 2) }}</span></div>
            <hr class="separator-horizontal"/>

            <div class="detail-row"><strong>Tax:</strong><span>Rs. {{ number_format($bid->tax_amount, 2) }}</span></div>
            <hr class="separator-horizontal"/>

            <div class="detail-row"><strong>Commission:</strong><span>Rs. {{ number_format($bid->commission, 2) }}</span></div>
            <hr class="separator-horizontal"/>

            <div class="detail-row"><strong>Total:</strong><span>Rs. {{ number_format($bid->total_price, 2) }}</span></div>
        </div>
        <div class="flex-row justify-end mt-2">
            <button class="button-outline cancel" wire:click="cancelBid">Cancel Bid</button>
        </div>
    </div>
</div>
