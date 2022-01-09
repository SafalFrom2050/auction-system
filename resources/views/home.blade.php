<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex md:flex-row justify-between h-screen">
            <div class="min-h-2/6 border border-gray-200 w-60 py-10 px-6 flex flex-col gap-4">
                <h3>Search Items</h3>

                <input type="text"
                       class="w-full border border-gray-200 bg-gray-50 text-sm"
                       placeholder="Jewellery..."
                       name="query"
                >

                <x-common.inputs.multi-range-slider />

            </div>
            <div>This is aonther oclumn</div>
        </div>
    </div>
</x-guest-layout>
