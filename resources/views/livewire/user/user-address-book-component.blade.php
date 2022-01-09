<section class="address-section">
    <h2 class="title-text">
        <i class="far fa-address-book"></i>
        ADDRESS BOOK

        @if(!$showForm)
            <button wire:click="newAddress" class="button-outline">ADD NEW ADDRESS</button>
        @else
            <span>ADD NEW ADDRESS</span>
            <x-common.dashboard.back-button />
        @endif

        <x-common.spinner />
    </h2>

    @if($showForm)
        <div wire:loading.remove>
            <livewire:user.user-address-book-form :addressId="$addressId" />
        </div>
    @else
        <div class="address-book flex-column" wire:loading.remove>

           <x-common.alert-msg :message="$message" />

            <div class="saved-address">
                @foreach($addresses as $address)

                    <x-cards.user-address-card
                        id="{{ $address->id }}"
                        heading="{{ $address->label }}"
                        address="{{ $address->address }}"
                        isDefault="{{ boolval($address->isDefault) }}"
                    />

                @endforeach

            </div>
        </div>

    @endif
</section>
