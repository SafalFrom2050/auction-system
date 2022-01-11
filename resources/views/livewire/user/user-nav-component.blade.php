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
        @endswitch
    </div>

</x-common.dashboard.side-nav>
