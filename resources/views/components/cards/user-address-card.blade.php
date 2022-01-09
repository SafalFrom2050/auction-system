@props([
    'id',
    'heading',
    'address',
    'isDefault' => false,
    'notice' => ''
])

<div class="address-list-wrapper">
    <div class="flex-column">
        <div class="address-list">
            <h3 class="heading">{{ $heading }}</h3>
            <p>
                {!! $address !!}
            </p>
        </div>

        <div class="notice">
            <p>{{ $notice }}</p>

            @if($isDefault)
                <p>
                    This is your default address<br/>
                </p>
            @endif
        </div>
    </div>

    <div class="flex-column my-1">
        <button wire:click="editAddress({{$id}})" class="button-icon">EDIT<span class="fas fa-pen"></span></button>
        <button wire:click="deleteAddress({{$id}})" class="button-icon" {{ $isDefault ? 'disabled' : '' }}>DELETE<span class="far fa-trash-alt"></span></button>
    </div>
</div>
