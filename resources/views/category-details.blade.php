<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex md:flex-row justify-between h-screen">
            <x-collection.search-filter
                :submit-route="route('category.search', ['category' => $category->id])"
                :search-data="$searchData ?? []"
                :show-categories="false"
            />
            <div class="flex-1 py-4 px-8">
                <h2 class="text-xl font-bold mb-2">{{$category->name}} Collection</h2>

                <div class="grid xl:grid-cols-3 sm:grid-cols-2 gap-4">

                    @foreach($items as $item)
                        <x-product.item-grid-card
                            :id="$item->id"
                            :image-url="$item->image_url"
                            :heading="$item->title"
                            :ratings="round($item->reviews_avg_rating, 1)"
                            :reviews-count="$item->reviews_count"
                            :highest-bid="$item->bids_max_price"
                            :expiry-date="$item->auction->end_date->diffForHumans()"
                        />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
