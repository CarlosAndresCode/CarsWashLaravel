@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card bg-white shadow">
                    <div class="card-header">{{ __('Create Service') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('services.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">{{__('Name')}}</label>
                                <input type="text" class="form-control bg-white" id="name" name="name" required value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">{{__('Description')}}</label>
                                <input type="text" class="form-control bg-white" id="description" name="description" value="{{ old('description') }}">
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">{{__('Price')}}</label>
                                <input type="number" class="form-control bg-white" id="price" name="price" required value="{{ old('price') }}">
                                @error('price')
                                 <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="type_service" class="form-label">{{__('Type of Service')}}</label>
                                <select class="form-select bg-white" id="type_service" name="type_service" required>
                                    <option value="car" {{ old('type_service') == 'car' ? 'selected' : '' }}>
                                        {{ __('Car') }}
                                    </option>
                                    <option value="motorcycle" {{ old('type_service') == 'motorcycle' ? 'selected' : '' }}>
                                        {{ __('Motorcycle') }}
                                    </option>
                                </select>
                                @error('type_service')
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
