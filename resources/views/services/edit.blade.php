@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card bg-white shadow">
                    <div class="card-header">{{ __('Edit Service') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('services.update', $service) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input type="text" class="form-control bg-white" id="name" name="name" required value="{{ $service->name ?? old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">{{__('Description')}}</label>
                                <input type="text" class="form-control bg-white" id="description" name="description" value="{{ $service->description ?? old('description') }}">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">{{__('Price')}}</label>
                                <input type="number" class="form-control bg-white" id="price" name="price" required value="{{ $service->price ?? old('price') }}">
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <x-button>{{ __('Save') }}</x-button>
                            <x-link href="{{ route('services.index') }}" class="btn btn-danger">{{ __('Cancel') }}</x-link>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
