<x-guest-layout>
    <div class="p-12 flex flex-col items-center">
        <div class="max-w-4xl gap-y-4 flex flex-col items-center justify-center">
            <h2 class="text-xl font-bold mb-2 w-full">Auctions</h2>

            @foreach($auctions as $auction)
                <x-auction.auction-list-item
                    :id="$auction->id"
                    :image-url="$auction->image_url"
                    :heading="$auction->heading"
                    :description="$auction->description"
                    :period="$auction->period"
                    :location="$auction->location"
                    :date="$auction->date_time->format('d/m/Y H:i A')"
                />
            @endforeach
            <x-auction.auction-list-item
                id="1"
                image-url="https://picsum.photos/400/300.webp?random=5"
                heading="21st Century English Paintings from Emergent Artist – The Blast Collection"
                description="An exceptionally fine contemporary painting capturing the lust for wealth that exemplified the early
                    part of the century within the capitalist financial markets of the world."
                date="Sat 29,10,2017"
                period="Afternoon"
                location="London"
            />
        </div>


    </div>
</x-guest-layout>
