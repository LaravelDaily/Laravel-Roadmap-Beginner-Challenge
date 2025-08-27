@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="card-deck">
                            <div class="card text-white bg-primary">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $articleCount }}</h5>
                                    <p class="card-text">{{ __('Total Article') }}</p>
                                </div>
                            </div>
                            <div class="card text-white bg-primary">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $categoryCount }}</h5>
                                    <p class="card-text">{{ __('Total Category') }}</p>
                                </div>
                            </div>
                            <div class="card text-white bg-primary">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $tagCount }}</h5>
                                    <p class="card-text">{{ __('Total Tag') }}</p>
                                </div>
                            </div>
                            <div class="card text-white bg-primary">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $userCount }}</h5>
                                    <p class="card-text">{{ __('Total User') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
