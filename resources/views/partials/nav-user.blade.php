@auth()
    <ul class="navbar-nav me-auto">
        <li class="nav-item">
            <a href="{{ route('customers.index') }}" class="nav-link {{ Route::is('customers.*') ? 'text-primary ' : '' }}">{{ __('Customers') }}</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('employees.index') }}" class="nav-link {{ Route::is('employees.*') ? 'text-primary ' : '' }}">{{ __('Employees') }}</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('services.index') }}" class="nav-link {{ Route::is('services.*') ? 'text-primary ' : '' }}">{{ __('Services') }}</a>
        </li>
    </ul>
@endauth
