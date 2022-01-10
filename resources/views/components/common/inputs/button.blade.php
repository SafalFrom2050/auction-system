@props(['value' => 'Button', 'wClass'=>'', 'class'=>'', 'primary'=>true])

<div class="{{$wClass}}">
<button class="mx-2 my-2 transition duration-150 ease-in-out rounded text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-600 {{$primary ? 'bg-gray-700 text-white hover:bg-gray-600 px-8 py-3' : 'bg-gray-50 hover:bg-gray-200 border border-gray-500 text-gray-700 px-6 py-2'}} {{$class}}">
    {{ $value }}
</button>
</div>
