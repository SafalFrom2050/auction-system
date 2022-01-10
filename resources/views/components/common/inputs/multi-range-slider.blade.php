<!-- component -->
<style>
    input[type=range]::-webkit-slider-thumb {
        pointer-events: all;
        width: 24px;
        height: 24px;
        -webkit-appearance: none;
        /* @apply w-6 h-6 appearance-none pointer-events-auto; */
    }
</style>
<div class="flex justify-center items-center">
    <div x-data="range()" x-init="mintrigger(); maxtrigger()" class="relative max-w-xl w-full">
        <div>
            <input type="range"
                   step="100"
                   x-bind:min="min" x-bind:max="max"
                   x-on:input="mintrigger"
                   x-model="minprice"
                   class="absolute pointer-events-none appearance-none z-20 h-3 w-full opacity-0 cursor-pointer">

            <input type="range"
                   step="100"
                   x-bind:min="min" x-bind:max="max"
                   x-on:input="maxtrigger"
                   x-model="maxprice"
                   class="absolute pointer-events-none appearance-none z-20 h-3 w-full opacity-0 cursor-pointer">

            <div class="relative z-10 h-1">

                <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>

                <div class="absolute z-20 top-0 bottom-0 rounded-md bg-gray-600" x-bind:style="'right:'+maxthumb+'%; left:'+minthumb+'%'"></div>

                <div class="absolute z-30 w-6 h-6 top-0 left-0 bg-gray-600 rounded-full -mt-2 -ml-1" x-bind:style="'left: '+minthumb+'%'"></div>

                <div class="absolute z-30 w-6 h-6 top-0 right-0 bg-gray-600 rounded-full -mt-2 -mr-3" x-bind:style="'right: '+maxthumb+'%'"></div>

            </div>

        </div>

        <div class="flex flex-row justify-between items-center py-5 gap-4">
            <div class="basis-1/2">
                <label class="flex items-center">
                    <span class="text-xs mr-1">Rs.</span>
                    <input type="text" readonly maxlength="5" x-on:input="mintrigger" x-model="minprice" class="px-0 w-16 h-8 border-gray-100 text-center text-xs">
                </label>
            </div>
            <span class="text-xs">To</span>
            <div class="basis-1/2">
                <label class="flex items-center">

                    <input type="text" readonly maxlength="5" x-on:input="maxtrigger" x-model="maxprice" class="px-0 w-16 h-8 border-gray-100 text-center text-xs">
                </label>
            </div>
        </div>

    </div>

    <script>
        function range() {
            return {
                minprice: 1000,
                maxprice: 7000,
                min: 100,
                max: 10000,
                minthumb: 0,
                maxthumb: 0,

                mintrigger() {
                    this.minprice = Math.min(this.minprice, this.maxprice - 500);
                    this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
                },

                maxtrigger() {
                    this.maxprice = Math.max(this.maxprice, this.minprice + 500);
                    this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);
                },
            }
        }
    </script>
</div>
