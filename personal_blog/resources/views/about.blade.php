@extends('layouts.app')

@section('content')
    <a href="{{route('welcome')}}">{{__('back')}}</a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('about') }}</div>

                    <div class="card-body">
                        {{ __('Some static text') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
