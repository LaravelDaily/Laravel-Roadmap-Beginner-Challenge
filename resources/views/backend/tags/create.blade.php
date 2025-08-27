@extends('layouts.app')

@push('css')
    <style>
        .card-header-with-button {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-with-button">
                        {{ __('Create Tag') }}
                        <a href="{{ route('backend.tags.index') }}" class="btn btn-success">{{ __('Back') }}</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('backend.tags.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                       placeholder="Name" value="{{ old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary float-right">{{ __('Create') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
