<div class="flex flex-col gap-2 items-center">
    <div class="w-62">
        <img src="{{$selectedImage}}" alt="Item Image">
    </div>

    <h3 class="text-gray-800 mr-auto mt-2 font-semibold">Other Images</h3>
    <div class="flex gap-1 items-center justify-center">
        @foreach($images as $image)
            <a href="#" wire:click="selectImage('{{$image}}')"><img class="w-16 {{$image === $selectedImage ? 'border border-4 border-gray-800' : ''}}" src="{{$image}}" alt="Item Image"></a>
        @endforeach
    </div>

</div>
