@auth()
    <ul class="navbar-nav me-auto">
        <li class="nav-item">
            <a href="{{ route('customers.index') }}" class="nav-link">{{ __('Customers') }}</a>
        </li>
    </ul>
@endauth
