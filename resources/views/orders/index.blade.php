@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card bg-white shadow">
                    <div class="card-header">
                        {{ __('Orders ') }}
                    </div>
                    <div class="card-body">
                        <div class="mb-1 float-start">
                            <form action="{{ route('services.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="search" name="search" class="form-control bg-white" placeholder="{{ __('Search') }}" value="{{ request('search') }}">
                                    <button class="btn btn-outline-secondary" type="submit">{{ __('Search') }}</button>
                                </div>
                            </form>
                        </div>
                        <div class="mb-1 float-end">
                            <x-link href="{{ route('orders.create') }}" class="btn btn-primary">
                                {{ __('Add') }}
                            </x-link>
                        </div>

                        <table class="table table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Vehicle</th>
                                    <th>Service</th>
                                    <th>Customer</th>
                                    <th>Employee</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="text-center">{{ $order->id }}</td>
                                        <td>{{ $order->vehicle->name }}</td>
                                        <td>{{ $order->service->name }}</td>
                                        <td>{{ $order->customer->full_name }}</td>
                                        <td>{{ $order->designation->employee->name ?? __('No assignment') }}</td>
                                        <td>{!! $order->status->badge() !!}</td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-primary btn-sm">{{__('Edit')}}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
