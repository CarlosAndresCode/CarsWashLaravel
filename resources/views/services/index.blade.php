@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card bg-white shadow">
                    <div class="card-header">{{ __('Services ') }}</div>
                    <div class="card-body">
                        <div class="mb-1 float-start">
                            <form action="{{ route('employees.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="search" name="search" class="form-control bg-white" placeholder="{{ __('Search') }}" value="{{ request('search') }}">
                                    <button class="btn btn-outline-secondary" type="submit">{{ __('Search') }}</button>
                                </div>
                            </form>
                        </div>
                        <div class="mb-1 float-end">
                            <x-link href="{{ route('services.create') }}" class="btn btn-primary">
                                {{ __('Add') }}
                            </x-link>
                        </div>

                        <table class="table table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td class="text-center">{{ $service->id }}</td>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ $service->price }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary btn-sm">{{__('Edit')}}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{ $services->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
