@auth()
    <ul class="navbar-nav me-auto">
        <li class="nav-item">
            <a href="{{ route('customers.index') }}" class="nav-link {{ Route::is('customers.*') ? 'text-primary ' : '' }}">{{ __('Customers') }}</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('employees.index') }}" class="nav-link {{ Route::is('employees.*') ? 'text-primary ' : '' }}">{{ __('Employees') }}</a>
        </li>
    </ul>
@endauth
