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
<ul class="navbar-nav ms-auto">
    {{--    Logout    --}}
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
</ul>
