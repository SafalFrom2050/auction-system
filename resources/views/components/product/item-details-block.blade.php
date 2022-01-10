@props(['item'])

<div class="flex flex-col w-full">
    <h4 class="font-bold text-xl text-gray-600">{{$item->title}}</h4>
    <div class="flex justify-between">
        <p class="text-gray-400 text-sm my-2">Expires on: <span class="text-gray-800">{{$item->auction->end_date->format('d/m/Y H:i A')}}</span></p>

        <div class="flex flex-col align-center items-end ml-auto">
                                <span class="text-gray-800 text-xs flex items-center justify-center leading-3"><span
                                        class="text-lg leading-3">☆</span> {{round($item->reviews_avg_rating, 1)}}</span>
            <span class="text-gray-600 text-xs">({{$item->reviews_count}} reviews)</span>
        </div>
    </div>

    <p class="mt-2 text-gray-800">
        {{$item->description}}
    </p>

    <div class="flex items-center mt-2">
        <label class="text-sm text-gray-800" for="amount">
            <span class="text-gray-600">Rs.</span>
            <input type="number" name="amount" value="{{($item->bids_max_price)}}"
                   class="w-28 text-sm text-gray-800 border-gray-400 rounded">
        </label>
        <x-common.inputs.button value="Bid" wClass="flex" class="p-0" :primary="false"/>
    </div>
    <span class="text-xs text-gray-400">Highest Bid: <span
            class="text-gray-800">Rs. {{number_format($item->bids_max_price)}}</span></span>
</div>
