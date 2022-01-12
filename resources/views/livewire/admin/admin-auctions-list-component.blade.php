<section class="address-section">
    <h2 class="title-text">
        <i class="far fa-address-book"></i>
        MANAGE AUCTIONS

        @if(!$showForm)
            <button wire:click="newAuction" class="button-outline">ADD NEW AUCTION</button>
        @else
            <span>ADD NEW AUCTION</span>
            <x-common.dashboard.back-button />
        @endif

        <x-common.spinner />
    </h2>

    @if($showForm)
        <div wire:loading.remove>
            <livewire:admin.admin-auction-form-component :auction-id="$auctionId" />
        </div>
    @else
        <div class="address-book flex-column" wire:loading.remove>

            <x-common.alert-msg :message="$message" />

            <div class="saved-address">
                @foreach($auctions as $auction)
                    <x-admin.cards.admin-auction-card
                        :key="$auction->id"
                        id="{{ $auction->id }}"
                        :heading="$auction->heading"
                        :location="$auction->location"
                        :period="$auction->period"
                        :end-date="$auction->end_date"
                        :date-time="$auction->date_time"
                        description="{{ $auction->description }}"
                        imageUrl="{{ $auction->image_url }}"
                        status="{{$auction->status}}"
                    />

                @endforeach

            </div>
        </div>

    @endif
</section>
