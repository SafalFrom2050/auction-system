<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col justify-between mb-4">
            <h3 class="font-medium text-xl text-gray-800 w-80p">{{$auction->heading}}</h3>

            <img src="{{$auction->image_url}}" class="object-cover w-3/6 mx-auto my-4 h-96" alt="Auction Image">

            <p class="text-gray-600 mt-2">{{$auction->description}}</p>
            <div class="flex mt-auto flex-wrap gap-x-4">
                <p class="text-gray-400 text-sm mt-2">Date: <span class="text-gray-800">{{$auction->date_time->format('d/m/Y H:i A')}}</span></p>
                <p class="text-gray-400 text-sm mt-2">Period: <span class="text-gray-800">{{$auction->period}}</span></p>
                <p class="text-gray-400 text-sm mt-2">Location: <span class="text-gray-800">{{$auction->location}}</span></p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex md:flex-row justify-between h-screen">
            <x-collection.search-filter
                :submit-route="route('auction.search', ['auction' => $auction->id])"
                :search-data="$searchData ?? []"
                :categories="$categories"
            />
            <div class="flex-1 py-4 px-8">
                <h2 class="text-xl font-bold mb-2">Collection</h2>

                <div class="grid xl:grid-cols-3 sm:grid-cols-2 gap-4">

                    @foreach($items as $item)
                        <x-product.item-grid-card
                            :id="$item->id"
                            :image-url="$item->image_url"
                            :heading="$item->title"
                            :ratings="round($item->reviews_avg_rating, 1)"
                            :reviews-count="$item->reviews_count"
                            :highest-bid="$item->bids_max_price"
                            :expiry-date="$auction->end_date->diffForHumans()"
                        />
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
