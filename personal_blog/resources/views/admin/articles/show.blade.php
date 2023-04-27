@extends('layouts.app')

@section('content')
    <a href="{{route('welcome')}}">{{__('back')}}</a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $article->title }}</div>
                    <div class="card-body">
                        <p>
                            {{$article->description}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
