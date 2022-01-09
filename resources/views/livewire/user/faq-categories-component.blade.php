<div>
    <h2 class="title-text">
        <img
            src="/svgs/circle-fill.svg"
            class="w-4 h-4 mb-2"
            alt="circle icon"
        />
        FAQS

        @if($selectedSubCategory)
            <span>{{ $selectedSubCategory->name }}</span>
            <x-common.dashboard.back-button value="GO BACK" action="back"/>
        @elseif($selectedCategory)
            <span>{{ $selectedCategory->name }}</span>
            <x-common.dashboard.back-button value="GO BACK" action="back"/>
        @endif

        <x-common.spinner target="selectCategory, back, selectSubCategory"/>

    </h2>
    <section class="faq-section" wire:loading.remove wire:target="selectedCategory, selectedSubCategory">

        @if($selectedSubCategory)
            <div class="sub-categories">
                @foreach($selectedSubCategory->faqs as $key=>$faq)
                    <p class="font-bold">{{ $key + 1 . ') ' .  $faq->question }}</p>
                    <p>{{ $faq->answer }}</p>
                @endforeach
            </div>
        @elseif($selectedCategory)
            <div class="sub-categories">
                @foreach($selectedCategory->subCategories as $key=>$subCategory)
                    <p wire:click="selectSubCategory({{$subCategory->id}})"
                       class="cursor-pointer font-bold">{{ $key + 1 . ') ' . $subCategory->name }}</p>
                @endforeach
            </div>
        @else
            <div class="categories">
                @foreach($categories as $category)
                    <div class="category-item" wire:loading.class="disable" wire:target="expandId({{ $category->id }})">
                        <div class="label" wire:click="expandId({{ $category->id }})">
                            <span>{{ $category->name }}</span>
                            <img class="arrow {{$expandedId == $category->id ? 'rotate-90' : 'rotate-0'}}"
                                 src="/svgs/arrow-right.svg" alt="Go"/>
                        </div>

                        <div class="sub-categories {{$expandedId == $category->id ? 'expand' : 'collapse'}}">
                            @foreach($category->subCategories as $subCategory)
                                <span wire:click="selectSubCategory({{$subCategory->id}})"
                                      class="cursor-pointer">{{ $subCategory->name }}</span>

                                @if ($loop->iteration == 4)
                                    @break
                                @endif
                            @endforeach
                            <a wire:click="selectCategory({{$category->id}})">View All</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </section>
</div>
