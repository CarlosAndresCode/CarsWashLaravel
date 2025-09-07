<ul class="navbar-nav ms-auto">
    <!-- Authentication Links -->
    @if (Route::has('login'))
        <li class="nav-item">
            <a class="nav-link {{ Route::is('login') ? 'text-primary' : '' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
    @endif

    @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link {{ Route::is('register') ? 'text-primary' : '' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
    @endif
</ul>
