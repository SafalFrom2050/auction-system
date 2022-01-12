<div class="dashboard-container">
    <nav class="side-nav">
        <div class="account-info">
            <div class="profile-img">@foreach(explode(' ', $username) as $part){{ $part[0] }}@endforeach</div>
            <span>Hi, <strong>{{ $username }}</strong></span>
        </div>
        <ul>
            <li>
                <a wire:click="setActiveNav('dashboard')" class={{ $active == 'dashboard' ? 'active' : '' }}>
                    <i class="far fa-user"></i>
                    Account overview
                </a>
            </li>

            <li>
                <a wire:click.="setActiveNav('bids')" class={{ $active == 'bids' ? 'active' : '' }}>
                    <i class="fas fa-shopping-bag"></i>
                    My bids
                </a>
            </li>

            @if(auth()->user()->client_type == 'seller' || auth()->user()->client_type == 'joint')
                <hr/>
                <p class="mx-4 text-xs mt-2 text-gray-600">Seller Controls</p>
                @can('edit', \App\Models\Item::class)
                    <li>
                        <a wire:click.="setActiveNav('seller.items-list')" class={{ $active == 'seller.items-list' ? 'active' : '' }}>
                            <i class="fas fa-shopping-bag"></i>
                            Manage Items
                        </a>
                    </li>
                @endcan
                <hr/>
            @endif

            <li class="group">
                <ul>
                    <li>
                        <a wire:click="setActiveNav('details')" class={{ $active == 'details' ? 'active' : '' }}>
                            <i class="far fa-id-card"></i>
                            My details
                        </a
                        >
                    </li>
                    <hr/>

                    <li>
                        <a wire:click="setActiveNav('address-book')"
                           class={{ $active == 'address-book' ? 'active' : '' }}>
                            <i class="far fa-address-book"></i>
                            Address book
                        </a
                        >
                    </li>
                    <hr/>

                    <li>
                        <a wire:click="setActiveNav('faq')" class={{ $active == 'faq' ? 'active' : '' }}>
                            <i class="fas fa-question"></i>
                            FAQS
                        </a
                        >
                    </li>
                    <hr/>

                    <li>
                        <a wire:click="setActiveNav('change-password')"
                           class={{ $active == 'change-password' ? 'active' : '' }}>
                            <i class="far fa-edit"></i>
                            Change password
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
    {{ $slot }}

</div>
