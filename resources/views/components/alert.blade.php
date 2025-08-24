@if (session('success'))
    <div class="container mb-4">
        <span
            x-data="{ show: true }"
            x-show="show"
            x-transition
            x-init="setTimeout(() => show = false, 2000)"
            class="alert alert-success"
            role="alert">
            <i class="fa fa-check-circle"></i>
            {{ session('success') }}
        </span>
    </div>
@endif
