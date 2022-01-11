@props([
    'id',
    'status',
    'lotNumber',
    'details' => []
])

<div class="card-item flex-column">
    <div class="overview flex-column my-1">
        <div class="status"><p class="text-green-500">{{ $status ? 'Active' : 'Not Active' }}</p></div>
        <span class="order-number heading">#Lot Number: {{ $lotNumber }}</span>

        @foreach($details as $detail)
            <span>{{ $detail }}</span>
        @endforeach
    </div>

    <div class="buttons">
        <button wire:click="setBidId({{$id}})" class="button-outline">View Details</button>
        <button class="button-outline cancel">Cancel Bid</button>
    </div>
</div>
