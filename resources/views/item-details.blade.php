<x-guest-layout>

    <div class="flex-1 px-2 py-8 flex flex-col md:flex-row gap-12 justify-center">
        <div class="flex flex-col md:grid md:grid-cols-2 gap-12 justify-center items-start flex-wrap">
            <div class="h-96 order-2 md:order-1">
                <livewire:item-gallery-component/>
            </div>

            <div class="w-96 h-96 order-1 md:order-2">
                <x-product.item-details-block/>
            </div>

            <div class="order-3 col-span-1">
                <p class="text-3xl lg:text-4xl font-semibold leading-7 lg:leading-9 text-gray-800 dark:text-white ">Rate
                    this item</p>
                <form class="flex items-center" method="POST">
                    @csrf
                    <x-common.inputs.star-ratings/>
                    <x-common.inputs.button value="Submit"/>
                </form>
            </div>
        </div>

        <div class="order-2">
            <h3 class="text-gray-800 mr-auto mb-2 font-semibold">Similar Items</h3>

            <div class="flex md:flex-col gap-2 flex-wrap">
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
</x-guest-layout>
