<x-admin.common.dashboard.side-nav active="{{ $navLink }}" :username="$username">

    <section wire:loading class="content-section">
        <x-common.spinner/>
    </section>

    <div wire:loading.remove class="content-section">
        @switch($navLink)

            @case('dashboard')
{{--            <livewire:user.user-dashboard-component :key="1"/>--}}
            @break

            @case('auctions')
                        <livewire:admin.admin-auctions-list-component :key="1"/>
            @break

            @case('items')
            <livewire:admin.admin-items-list-component :key="2"/>
            @break

            @case('users')
            <livewire:admin.admin-user-list-component :key="3"/>
            @break


            @default
{{--            <livewire:user.user-dashboard-component :key="8"/>--}}
            @break

        @endswitch
    </div>

</x-admin.common.dashboard.side-nav>
