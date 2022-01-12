@props([
    'id',
    'lotNo',
    'artist' => '',
    'classification' => false,
    'productionDate' => '',
    'title',
    'estPrice',
    'description',
    'imageUrl',
    'category',
    'expiryDate'
])

<div class="address-list-wrapper">
    <div class="flex-column">
        <div class="address-list gap-y-2">
            <h3 class="heading">{{ $title }}</h3>
            <p class="text-gray-400 my-2">Lot Number: <span class="text-gray-800">{{($lotNo) ?? '--'}}</span></p>
            <p class="text-gray-400 my-2">Artist: <span class="text-gray-800">{{ucfirst($artist)}}</span></p>
            <p class="text-gray-400 my-2">Classification: <span class="text-gray-800">{{ucfirst($classification)}}</span></p>
            <p class="text-gray-400 my-2">Production Date: <span class="text-gray-800">{{ucfirst($productionDate)}}</span></p>
            <p class="text-gray-400 my-2">Title: <span class="text-gray-800">{{ucfirst($title)}}</span></p>
            <p class="text-gray-400 my-2">Starting Price: <span class="text-gray-800">{{($estPrice) ?? '--'}}</span></p>
            <p class="text-gray-400 my-2">Description: <span class="text-gray-800">{{ucfirst($description)}}</span></p>
            <p class="text-gray-400 my-2">Category: <span class="text-gray-800">{{ucfirst($category)}}</span></p>
            <p class="text-gray-400 my-2">Expiry Date: <span class="text-gray-800">{{($expiryDate) ?? ''}}</span></p>

        </div>

    </div>

    <div class="flex-column my-1">
        <button wire:click="editItem({{$id}})" class="button-icon">EDIT<span class="fas fa-pen"></span></button>
        <button wire:click="deleteItem({{$id}})" class="button-icon">DELETE<span class="far fa-trash-alt"></span></button>
    </div>
</div>
