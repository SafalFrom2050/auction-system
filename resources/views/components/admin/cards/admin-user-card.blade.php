@props([
    'id',
    'title',
    'name',
    'email',
    'phone',
    'dob',
    'clientType',
    'isApproved',
    'bankAccountNo',
    'bankSortCode',
    'createdAt',
])

<div class="address-list-wrapper">
    <div class="flex-column">
        <div class="address-list gap-y-2">
            <h3 class="text-lg">Name: <span class="text-gray-800">{{ $title . ' '.$name }}</span></h3>
            <p class="text-gray-400 my-2">Email: <span class="text-gray-800">{{ucfirst($email)}}</span></p>
            <p class="text-gray-400 my-2">Phone: <span class="text-gray-800">{{ucfirst($phone)}}</span></p>
            <p class="text-gray-400 my-2">DOB: <span class="text-gray-800">{{$dob}}</span></p>
            <p class="text-gray-400 my-2">Client Type: <span class="text-gray-800">{{($clientType) ?? ''}}</span></p>
            <p class="text-gray-400 my-2">Is Approved: <span class="text-gray-800">{{($isApproved ? 'yes' : 'no') ?? ''}}</span></p>
            <p class="text-gray-400 my-2">Bank Account Number: <span class="text-gray-800">{{($bankAccountNo) ?? ''}}</span></p>
            <p class="text-gray-400 my-2">Bank Sort Code: <span class="text-gray-800">{{($bankSortCode) ?? ''}}</span></p>
            <p class="text-gray-400 my-2">Created At: <span class="text-gray-800">{{($createdAt) ?? ''}}</span></p>
        </div>

    </div>

    <div class="flex-column my-1">
        <button wire:click="deleteUser({{$id}})" class="button-icon">DELETE<span class="far fa-trash-alt"></span></button>
        <button wire:click="toggleApprove({{$id}})" class="button-icon text-lg">{{$isApproved ? 'DISAPPROVE' : 'APPROVE'}}<span class="fas {{ $isApproved ? 'fa-lock-open' : 'fa-lock'}}"></span></button>
    </div>
</div>
