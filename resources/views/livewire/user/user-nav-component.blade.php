<div class="pb-12">
    <h2 class="text-center font-bold text-3xl mb-4">Manage Your Account</h2>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-gray-50 border-b border-gray-200">
<x-common.dashboard.side-nav active="{{ $navLink }}" :username="$username">

    <section wire:loading class="content-section">
        <x-common.spinner/>
    </section>

    <div wire:loading.remove class="content-section">
        @switch($navLink)

            @case('dashboard')
            <livewire:user.user-dashboard-component :key="1"/>
            @break

            @case('notifications')
            <livewire:user.user-notifications-component :key="2"/>
            @break

            @case('bids')
            <livewire:user.user-bids-component :key="3"/>
            @break

            @case('details')
            <livewire:user.user-details-component :key="4"/>
            @break

            @case('address-book')
            <livewire:user.user-address-book-component :key="5"/>
            @break

            @case('change-password')
            <livewire:user.user-change-password-component :key="6"/>
            @break

            @case('faq')
            <livewire:user.faq-categories-component :key="7"/>
            @break

            @default
            <livewire:user.user-dashboard-component :key="8"/>
            @break

            @case('seller.items-list')
            <livewire:seller.seller-items-list-component :key="9"/>
            @break
        @endswitch
    </div>

</x-common.dashboard.side-nav>
            </div>
        </div>
    </div>
</div>
