@props(['imageUrl', 'heading', 'ratings', 'reviewsCount', 'highestBid', 'expiryDate', 'id'])


<a href="{{route('item.details', ['id' => 1, 'name'=>'test'])}}">
    <div class="p-4 flex flex-col w-72 border border-gray-200 bg-gray-50">
        <img src="{{$imageUrl}}" alt="Item Image">
        <div class="flex flex-col w-full mt-2">
            <h4 class="font-light text-gray-800 w-80p mr-16">{{$heading}}</h4>
            <div class="ml-auto mt-[-16px] flex flex-col items-end">
                <div class="flex flex-col align-center items-end ml-auto">
                                <span class="text-gray-800 text-xs flex items-center justify-center leading-3"><span
                                        class="text-lg leading-3">☆</span> {{$ratings}}</span>
                    <span class="text-gray-600 text-xs">({{$reviewsCount}} reviews)</span>
                </div>

            </div>

        </div>

        <div class="flex-1 flex mt-2 mb-1">
            <span class="text-xs text-gray-400 ml-auto">Highest Bid: <span class="text-gray-800">Rs.{{$highestBid}}</span></span>
        </div>

        <div class="flex justify-between items-center">
            <p class="text-gray-400 text-sm mt-2">Expires on: <span class="text-gray-800">{{$expiryDate}}</span></p>
            <x-common.inputs.button value="Bid" wClass="flex" class="ml-auto" w-class="h-12" :primary="false"/>
        </div>
    </div>
</a>
