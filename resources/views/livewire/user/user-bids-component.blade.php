<section>
    <h2 class="title-text">
        <i class="fas fa-shopping-bag mb-2"></i>

        MY BIDS

        @if($bidId)
            <x-common.dashboard.back-button/>
        @endif
        <x-common.spinner/>
    </h2>

    @if($bidId)
        <div>
            <livewire:user.user-bid-item-component :bidId="$bidId"/>
        </div>
    @else

        <div class="order-cards" wire:loading.remove>

            @foreach($bids as $bid)
                <x-cards.user-order-card
                    :key="$bid->id"
                    :id="$bid->id"
                    status="{{$bid->status}}"
                    lotNumber="{{ $bid->item->lot_no }}"
                    :details="[
                        'Piece Title: ' . $bid->item->title ,
                        'Amount: ' . 'Rs.' . number_format($bid->price),
                        'Date: ' . ($bid->created_at ? $bid->created_at->diffForHumans() : '')
                    ]"/>
            @endforeach

            @if(count($bids) == 0)
                <div class="no-orders flex-column align-center gap-y-2">
                    <i class="fas fa-shopping-bag mb-2"></i>

                    <h3>You haven't placed any bids</h3>

                    <a href="/">
                    <button class="button-fill">START BIDDING</button>
                    </a>
                </div>
            @endif
        </div>
    @endif

</section>
