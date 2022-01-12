@props([
    'id',
    'heading',
    'description',
    'imageUrl',
    'endDate',
    'period',
    'location',
    'dateTime',
    'status'
])

<div class="address-list-wrapper">
    <div class="flex-column">
        <div class="address-list gap-y-2">
            <h3 class="text-lg">{{ $heading }}</h3>
            <p class="text-gray-400 my-2">Description: <span class="text-gray-800">{{ucfirst($description)}}</span></p>
            <p class="text-gray-400 my-2">Period: <span class="text-gray-800">{{ucfirst($period)}}</span></p>
            <p class="text-gray-400 my-2">Location: <span class="text-gray-800">{{ucfirst($location)}}</span></p>
            <p class="text-gray-400 my-2">Date and Time: <span class="text-gray-800">{{($dateTime) ?? ''}}</span></p>
            <p class="text-gray-400 my-2">End Date: <span class="text-gray-800">{{($endDate) ?? ''}}</span></p>
        </div>

    </div>

    <div class="flex-column my-1">
        <button wire:click="editAuction({{$id}})" class="button-icon">EDIT<span class="fas fa-pen"></span></button>
        <button wire:click="deleteAuction({{$id}})" class="button-icon">DELETE<span class="far fa-trash-alt"></span></button>

        <button wire:click="toggleStatus({{$id}})" class="button-icon text-lg">{{$status == 'closed' ? 'OPEN' : 'CLOSE'}}<span class="fas {{ $status == 'closed' ? 'fa-lock-open' : 'fa-lock'}}"></span></button>

    </div>
</div>
