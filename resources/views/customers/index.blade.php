@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card bg-white shadow">
                    <div class="card-header">{{ __('Customers') }}</div>
                    <div class="card-body">
                        <div class="mb-1 float-start">
                            <form action="{{ route('customers.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="search" name="search" class="form-control bg-white" placeholder="{{ __('Search') }}" value="{{ request('search') }}">
                                    <button class="btn btn-outline-secondary" type="submit">{{ __('Search') }}</button>
                                </div>
                            </form>
                        </div>
                        <div class="mb-1 float-end">
                            <a href="{{ route('customers.create') }}" class="btn btn-primary">Add</a>
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->id }}</td>
                                        <td>{{ $customer->getFullNameAttribute() }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{ $customers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
