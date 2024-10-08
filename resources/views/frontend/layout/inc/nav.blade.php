@php
    $setting = App\Models\Setting::where('id', 1)->first();
@endphp
<header class="header-area style-2">
    <div class="header-logo">
        <a href="{{ route('home') }}"><img alt="image" class="img-fluid"
                src="{{ asset('uploads/setting') }}/{{ $setting->logo }}"></a>
    </div>
    <div class="main-menu">
        <div class="mobile-logo-area d-lg-none d-flex justify-content-between align-items-center">
            <div class="mobile-logo-wrap">
                <a href="{{ route('home') }}"><img alt="image" src="{{ asset('uploads/setting') }}/{{ $setting->logo }}"></a>
            </div>
            <div class="menu-close-btn">
                <i class="bi bi-x"></i>
            </div>
        </div>
        <ul class="menu-list">
            <li class="@if (Route::is('home')) active @endif">
                <a href="{{ route('home') }}" class="drop-down">Home</a>
            </li>
            <li class="@if (Route::is('about')) active @endif">
                <a href="{{ route('about') }}" class="drop-down">About</a>
            </li>
            <li class="@if (Route::is('destinations')) active @endif">
                <a href="{{ route('destinations') }}" class="drop-down">Destinations</a>
            </li>
            <li class="@if (Route::is('packages')) active @endif">
                <a href="{{ route('packages') }}" class="drop-down">Packages</a>
            </li>

            <li class="@if (Route::is('team_members')) active @endif">
                <a href="{{ route('team_members') }}" class="drop-down">Team</a>
            </li>
            <li class="@if (Route::is('faq')) active @endif">
                <a href="{{ route('faq') }}" class="drop-down">FAQ</a>
            </li>
            <li class="@if (Route::is('blog')) active @endif">
                <a href="{{ route('blog') }}" class="drop-down">Blog</a>
            </li>
            <li class="@if (Route::is('contact')) active @endif">
                <a href="{{ route('contact') }}" class="drop-down">Contact</a>
            </li>
            @guest
                <li class="d-lg-none"> <!-- Visible only on mobile screens -->
                    <a href="{{ route('login') }}" class="primary-btn3 text-center">Login</a>
                </li>
            @endguest
        </ul>
    </div>
    <div class="nav-right d-flex jsutify-content-end align-items-center">
        @guest
            <a href="{{ route('login') }}" class="primary-btn3 d-none d-xl-flex">Login</a>
            <!-- Hidden on mobile screens -->
        @endguest
        @auth
            <a href="{{ route('dashboard') }}" class="primary-btn3 d-none d-xl-flex">Dashboard</a>
            <!-- Hidden on mobile screens -->
        @endauth
        <div class="sidebar-button mobile-menu-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25">
                <path
                    d="M0 4.46439C0 4.70119 0.0940685 4.92829 0.261511 5.09574C0.428955 5.26318 0.656057 5.35725 0.892857 5.35725H24.1071C24.3439 5.35725 24.571 5.26318 24.7385 5.09574C24.9059 4.92829 25 4.70119 25 4.46439C25 4.22759 24.9059 4.00049 24.7385 3.83305C24.571 3.6656 24.3439 3.57153 24.1071 3.57153H0.892857C0.656057 3.57153 0.428955 3.6656 0.261511 3.83305C0.0940685 4.00049 0 4.22759 0 4.46439ZM4.46429 11.6072H24.1071C24.3439 11.6072 24.571 11.7013 24.7385 11.8688C24.9059 12.0362 25 12.2633 25 12.5001C25 12.7369 24.9059 12.964 24.7385 13.1315C24.571 13.2989 24.3439 13.393 24.1071 13.393H4.46429C4.22749 13.393 4.00038 13.2989 3.83294 13.1315C3.6655 12.964 3.57143 12.7369 3.57143 12.5001C3.57143 12.2633 3.6655 12.0362 3.83294 11.8688C4.00038 11.7013 4.22749 11.6072 4.46429 11.6072ZM12.5 19.643H24.1071C24.3439 19.643 24.571 19.737 24.7385 19.9045C24.9059 20.0719 25 20.299 25 20.5358C25 20.7726 24.9059 20.9997 24.7385 21.1672C24.571 21.3346 24.3439 21.4287 24.1071 21.4287H12.5C12.2632 21.4287 12.0361 21.3346 11.8687 21.1672C11.7012 20.9997 11.6071 20.7726 11.6071 20.5358C11.6071 20.299 11.7012 20.0719 11.8687 19.9045C12.0361 19.737 12.2632 19.643 12.5 19.643Z" />
            </svg>
        </div>
    </div>
</header>
