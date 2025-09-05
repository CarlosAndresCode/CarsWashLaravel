@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-2">
        <div class="col-md-4" style="width: 33.33%;">
            <div class="card" style="height: 120px;">
                <div class="lead float-start">Customers</div>
                <div class="float-end">
                    {{ $stats['totalCustomers'] }}
                </div>
            </div>
        </div>
        <div class="col-md-4" style="width: 33.33%;">
            <div class="card" style="height: 120px;">

            </div>
        </div>
        <div class="col-md-4" style="width: 33.33%;">
            <div class="card" style="height: 120px;">

            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card bg-white shadow">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
