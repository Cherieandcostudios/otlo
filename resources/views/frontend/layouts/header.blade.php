<!-- Header -->
<header>
    <div class="header-content">
        <div style="display: flex; align-items: center;">
            <a href="{{ route('home') }}" class="logo">
                <div class="logo-circle">
                    <img src="{{ asset('assets/image/logo.jpg') }}" alt="Otlo Cafe Logo" srcset="{{ asset('assets/image/logo.jpg') }} 1x, {{ asset('assets/image/logo.jpg') }} 2x">
                </div>
            </a>

            <nav>
                <ul class="nav-menu">
                    <li><a href="{{ route('frontend.menu') }}">Menu</a></li>
                    <li><a href="{{ route('frontend.rewards') }}">Rewards</a></li>
                    <li><a href="{{ route('frontend.franchise') }}">Franchise</a></li>
                </ul>
            </nav>
        </div>

        <div class="header-right">
            <a href="{{ route('frontend.location') }}" class="find-store">Find a store</a>

            @auth('customer')
                <div class="customer-dropdown">
                    <button class="customer-name-btn" onclick="toggleCustomerDropdown()">
                        <span>{{ auth('customer')->user()->name }}</span>
                        <svg class="dropdown-arrow" width="12" height="8" viewBox="0 0 12 8">
                            <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="2" fill="none"/>
                        </svg>
                    </button>
                    <div class="customer-dropdown-menu" id="customerDropdown">
                        <a href="{{ route('frontend.profile') }}" class="dropdown-item">Profile</a>
                        <a href="{{ route('frontend.rewards') }}" class="dropdown-item">My Rewards</a>
                        <form method="POST" action="{{ route('frontend.logout') }}" class="dropdown-form">
                            @csrf
                            <button type="submit" class="dropdown-item logout-btn">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="auth-buttons">
                    <a href="{{ route('frontend.signin') }}" class="btn btn-outline">Sign in</a>
                    <a href="{{ route('frontend.join') }}" class="btn btn-primary">Join now</a>
                </div>
            @endauth

            <button class="mobile-menu-toggle">☰</button>
        </div>
    </div>
</header>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobileMenu">
    <button class="mobile-menu-close" id="mobileMenuClose">×</button>
    <div class="mobile-menu-content">
        <a href="{{ route('frontend.menu') }}">Menu</a>
        <a href="{{ route('frontend.rewards') }}">Rewards</a>
        <a href="{{ route('frontend.franchise') }}">Franchise</a>
        <a href="{{ route('frontend.location') }}" class="find-store-mobile">Find a store</a>
        @auth('customer')
            <div class="mobile-customer">
                <div class="mobile-customer-name">{{ auth('customer')->user()->name }}</div>
                <a href="{{ route('frontend.profile') }}" class="mobile-menu-item">Profile</a>
                <a href="{{ route('frontend.rewards') }}" class="mobile-menu-item">My Rewards</a>
                <form method="POST" action="{{ route('frontend.logout') }}" class="mobile-logout-form">
                    @csrf
                    <button type="submit" class="mobile-logout-btn">Logout</button>
                </form>
            </div>
        @else
            <div class="mobile-auth">
                <a href="{{ route('frontend.signin') }}" class="btn btn-outline">Sign in</a>
                <a href="{{ route('frontend.join') }}" class="btn btn-primary">Join now</a>
            </div>
        @endauth
    </div>
</div>