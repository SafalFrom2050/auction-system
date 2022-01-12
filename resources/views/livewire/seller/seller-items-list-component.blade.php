<section class="address-section">
    <h2 class="title-text">
        <i class="far fa-address-book"></i>
        ITEMS LISTING

        @if(!$showForm)
            <button wire:click="newItem" class="button-outline">ADD NEW ITEM</button>
        @else
            <span>ADD NEW ITEM</span>
            <x-common.dashboard.back-button />
        @endif

        <x-common.spinner />
    </h2>

    @if($showForm)
        <div wire:loading.remove>
            <livewire:seller.seller-item-form-component :item-id="$itemId" />
        </div>
    @else
        <div class="address-book flex-column" wire:loading.remove>

            <x-common.alert-msg :message="$message" />

            <div class="saved-address">
                @foreach($items as $item)
                    <x-cards.seller-item-card
                        :key="$item->id"
                        id="{{ $item->id }}"
                        lotNo="{{$item->lot_no}}"
                        artist="{{$item->artist}}"
                        classification="{{$item->classification}}"
                        productionDate="{{$item->production_date}}"
                        title="{{ $item->title }}"
                        estPrice="{{ $item->est_price }}"
                        description="{{ $item->description }}"
                        imageUrl="{{ $item->image_url }}"
                        category="{{ $item->category->name }}"
                        expiryDate="{{ $item->auction->end_date->format('y/m/d H:i A') }}"
                    />

                @endforeach

            </div>
        </div>

    @endif
</section>
