@props([
    'id',
    'status',
    'orderNumber',
    'details' => []
])

<div class="card-item flex-column">
    <div class="overview flex-column my-1">
        <div class="status">{{ $status }}</div>
        <span class="order-number heading">#Order Number: {{ $orderNumber }}</span>

        @foreach($details as $detail)
            <span>{{ $detail }}</span>
        @endforeach
    </div>

    <div class="buttons">
        <button wire:click="setOrderItem({{$id}})" class="button-outline">View Order</button>
        <button class="button-outline cancel">Cancel Order</button>
    </div>
</div>
