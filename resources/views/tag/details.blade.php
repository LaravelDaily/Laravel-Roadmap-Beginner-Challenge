@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container-fluid">
        <div class="row flex-nowrap">
            @include('includes.sidebar')
            <div class="col py-3">
                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                
                <h1 class="text-decoration-underline mb-3 d-inline">Tag Details</h1> <a href="{{ url()->previous() }}" class="btn btn-dark mx-3 mb-3">Back</a>
                <h4><b>Name:</b> {{$tag->name}}</h4>
                <h4><b>Created At:</b> {{$tag->created_at? $tag->created_at->format('d M Y - H:i:s') : 'Not Defined' }}</h4>
            </div>
        </div>
    </div>
</div>
@endsection