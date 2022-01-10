@props(['heading', 'description', 'date', 'period', 'location'])

<a href="{{route('auction.details', ['id'=>1])}}">
    <div class="flex flex-col md:flex-row gap-4 h-72 bg-gray-100 border border-gray-400 p-4">
        <img src="https://picsum.photos/400/300.webp?random=5" class="object-cover w-72" alt="Auction Image">
        <div class="flex flex-col gap-2">
            <h3 class="font-medium text-lg text-gray-800 w-80p">{{$heading}}</h3>
            <p class="text-gray-600 text-sm mt-2">{{$description}}</p>
            <div class="flex mt-auto flex-wrap gap-x-4">
                <p class="text-gray-400 text-sm mt-2">Date: <span class="text-gray-800">{{$date}}</span></p>
                <p class="text-gray-400 text-sm mt-2">Period: <span class="text-gray-800">{{$period}}</span></p>
                <p class="text-gray-400 text-sm mt-2">Location: <span class="text-gray-800">{{$location}}</span></p>
            </div>
        </div>
    </div>
</a>
