<x-guest-layout>

    @if(session()->has('success'))
        <div class="flex-1 mx-4 flex justify-center">
            <div class="bg-green-50 border border-green-100 px-4">
                <p class="text-green-400 my-2">{{session('success')}}</p>
            </div>
        </div>
    @endif
    <div class="flex-1 px-2 py-8 flex flex-col md:flex-row gap-12 justify-center">
        <div class="flex flex-col md:grid md:grid-cols-2 gap-12 justify-center items-start flex-wrap">
            <div class="h-96 order-2 md:order-1">
                <livewire:item-gallery-component/>
            </div>

            <div class="w-96 h-96 order-1 md:order-2">
                <x-product.item-details-block :item="$item" :canBid="$canBid"/>
            </div>

            <div class="order-3 md:grid md:grid-cols-2 col-span-2 mt-4">
                <p class="col-span-2 text-xl lg:text-2xl font-semibold leading-7 lg:leading-9 text-gray-800 dark:text-white">
                    Additional Details
                </p>

                <div class="mb-2">
                    <p class="text-gray-400 my-2">Category:
                        <a href="{{route('category.details', ['category'=>$item->category->id])}}">
                        <span class="text-gray-800">
                           {{$item->category->name}}
                        </span>
                        </a>
                    </p>

                    <p class="text-gray-400 my-2">Lot Number:
                        <a href="{{route('auction.details', ['auction'=>$item->auction->id])}}">
                        <span class="text-gray-800">
                           {{$item->lot_no}}
                        </span>
                        </a>
                    </p>

                    <p class="text-gray-400 my-2">Classification:
                        <span class="text-gray-800">{{ucfirst($item->classification)}}</span>
                    </p>

                    <p class="text-gray-400 my-2">Artist:
                        <span class="text-gray-800">{{ucfirst($item->artist)}}</span>
                    </p>
                </div>

                <div>

                    @foreach($item->additionalDetails as $detail)
                        <p class="text-gray-400 my-2">{{ucfirst($detail->categorySpecificDetail->name)}}:
                            <span class="text-gray-800">
                            @switch($detail->categorySpecificDetail->type)
                                    @case('boolean')
                                    {{$detail->value ? 'Yes' : 'No'}}
                                    @break
                                    @default
                                    {{ucfirst($detail->value)}}
                                @endswitch
                        </span>
                        </p>
                    @endforeach
                </div>
            </div>

            @if($canRate)
                <div class="order-4 col-span-1 mt-4">
                    <p class="text-xl lg:text-2xl font-semibold leading-7 lg:leading-9 text-gray-800 dark:text-white">
                        Rate
                        this item</p>
                    <form class="flex items-center" method="POST"
                          action="{{route('item.rate', ['item' => $item->id])}}">
                        @csrf
                        <x-common.inputs.star-ratings rating="0"/>
                        <x-common.inputs.button value="Submit"/>
                    </form>
                </div>
            @endif
        </div>

        <div class="order-2  h-96">
            <h3 class="text-gray-800 mr-auto mb-2 font-semibold">Similar Items</h3>

            <div class="flex md:flex-col gap-2 flex-wrap">

                @foreach($similarItems as $item)
                    <x-product.item-grid-card
                        :id="$item->id"
                        :image-url="$item->image_url"
                        :heading="$item->title"
                        :ratings="round($item->reviews_avg_rating, 1)"
                        :reviews-count="$item->reviews_count"
                        highest-bid="50,000"
                        :expiry-date="$item->auction->end_date->diffForHumans()"
                    />
                @endforeach

            </div>
        </div>
    </div>
</x-guest-layout>
