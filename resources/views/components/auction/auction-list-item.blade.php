@props(['heading', 'description', 'date', 'period', 'location', 'imageUrl', 'id'])

<a href="{{route('auction.details', ['auction'=>$id])}}">
    <div class="flex flex-col md:flex-row gap-4 md:h-72 bg-gray-100 border border-gray-400 p-4">
        <img src={{$imageUrl}} class="object-cover w-72" alt="Auction Image">
        <div class="flex flex-col gap-2">
            <h3 class="font-medium text-lg text-gray-800 w-80p">{{$heading}}</h3>
            <p class="text-gray-600 text-sm mt-2 text-ellipsis overflow-hidden ">{{$description}}</p>
            <div class="flex mt-auto flex-wrap gap-x-4">
                <p class="text-gray-400 text-sm mt-2">Date: <span class="text-gray-800">{{$date}}</span></p>
                <p class="text-gray-400 text-sm mt-2">Period: <span class="text-gray-800">{{$period}}</span></p>
                <p class="text-gray-400 text-sm mt-2">Location: <span class="text-gray-800">{{$location}}</span></p>
            </div>
        </div>
    </div>
</a>
