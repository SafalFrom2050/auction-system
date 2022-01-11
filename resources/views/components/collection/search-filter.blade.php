@props(['showCategories' => true, 'submitRoute', 'searchData' => [], 'categories'])

<form method="GET" action="{{$submitRoute}}"
      class="min-h-2/6 border border-gray-200 w-60 py-10 px-6 flex flex-col gap-4 hidden lg:flex">
    <h3>Search Items</h3>

    <x-common.inputs.text name="query" label="" placeholder="old painting, arts, sculptures"
                          value="{{$searchData['query'] ?? ''}}"/>

    <div class="flex flex-col gap-4 mt-4">
        <h4>Price Range</h4>
        <x-common.inputs.multi-range-slider name="price_range" minprice="{{$searchData['price_range_min'] ?? 0}}"
                                            maxprice="{{$searchData['price_range_max'] ?? 1000000}}"/>
    </div>

    <div class="flex flex-col">
        <h4>Minimum Ratings</h4>
        <x-common.inputs.star-ratings :rating="$searchData['rating'] ?? 1"/>
    </div>

    @if($showCategories)
        <div class="flex flex-col gap-4">
            <h4>Categories</h4>
            <x-common.inputs.checkbox-group
                :options="$categories" name="categories"
                :selected-indexes="isset($searchData['categories']) ? array_keys($searchData['categories']) : []"/>
        </div>
    @endif

    <x-common.inputs.button value="Apply Filter" wClass="mt-auto flex" class="flex-1"/>

</form>
