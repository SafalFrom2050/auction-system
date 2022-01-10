<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col justify-between mb-4">
            <h3 class="font-medium text-xl text-gray-800 w-80p">21st Century English Paintings from Emergent Artist –
                The Blast Collection</h3>

            <img src="https://picsum.photos/400/300.webp?random=5" class="object-cover w-3/6 mx-auto my-4 h-96" alt="Auction Image">

            <p class="text-gray-600 mt-2">An exceptionally fine contemporary painting capturing the lust for
                wealth that exemplified the early
                part of the century within the capitalist financial markets of the world.</p>
            <div class="flex mt-auto flex-wrap gap-x-4">
                <p class="text-gray-400 text-sm mt-2">Date: <span class="text-gray-800">Sat 29,10,2017</span></p>
                <p class="text-gray-400 text-sm mt-2">Period: <span class="text-gray-800">Afternoon</span></p>
                <p class="text-gray-400 text-sm mt-2">Location: <span class="text-gray-800">London</span></p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex md:flex-row justify-between h-screen">
            <div class="min-h-2/6 border border-gray-200 w-60 py-10 px-6 flex flex-col gap-4 hidden lg:flex">
                <h3>Search Items</h3>


                <x-common.inputs.text name="query" label="" placeholder="old painting, arts, sculptures"/>

                <div class="flex flex-col gap-4 mt-4">
                    <h4>Price Range</h4>
                    <x-common.inputs.multi-range-slider/>
                </div>

                <div class="flex flex-col">
                    <h4>Minimum Ratings</h4>
                    <x-common.inputs.star-ratings/>
                </div>

                <div class="flex flex-col gap-4">
                    <h4>Categories</h4>
                    <x-common.inputs.checkbox-group :options="[1=>'Fashion', 2=>'Paintings']" name="categories"/>
                </div>

                <x-common.inputs.button value="Apply Filter" wClass="mt-auto flex" class="flex-1"/>

            </div>
            <div class="flex-1 py-4 px-8">
                <h2 class="text-xl font-bold mb-2">Collection</h2>

                <div class="grid xl:grid-cols-3 sm:grid-cols-2 gap-4">
                    <x-product.item-grid-card
                        image-url="https://picsum.photos/400/300.webp?random=1"
                        heading="Mid-Atlantic States Spiral Slip Patterned Crimson Earthenware Bowl, 19th Century"
                        ratings="4.7"
                        reviews-count="50"
                        highest-bid="50,000"
                        expiry-date="5th Jan"
                    />
                    <x-product.item-grid-card
                        image-url="https://picsum.photos/400/300.webp?random=2"
                        heading="Mid-Atlantic States Spiral Slip Patterned Crimson Earthenware Bowl, 19th Century"
                        ratings="4.7"
                        reviews-count="50"
                        highest-bid="50,000"
                        expiry-date="5th Jan"
                    />
                    <x-product.item-grid-card
                        image-url="https://picsum.photos/400/300.webp?random=3"
                        heading="Mid-Atlantic States Spiral Slip Patterned Crimson Earthenware Bowl, 19th Century"
                        ratings="4.7"
                        reviews-count="50"
                        highest-bid="50,000"
                        expiry-date="5th Jan"
                    />
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
