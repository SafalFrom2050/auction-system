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
                    Overview
                </a>
            </li>

            <li>
                <a wire:click="setActiveNav('auctions')" class={{ $active == 'auctions' ? 'active' : '' }}>
                    <i class="fas fa-layer-group"></i>
                    Manage Auctions
                </a>
            </li>

            <li>
                <a wire:click="setActiveNav('items')" class={{ $active == 'items' ? 'active' : '' }}>
                    <i class="fas fa-sitemap"></i>
                    Manage Items
                </a>
            </li>

            <li>
                <a wire:click="setActiveNav('users')" class={{ $active == 'users' ? 'active' : '' }}>
                    <i class="fas fa-user-friends"></i>
                    Manage Users
                </a>
            </li>

            <li class="group">
                <ul>

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

                    <li>
                        <a href="{{route('admin.logout')}}">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
    {{ $slot }}

</div>
