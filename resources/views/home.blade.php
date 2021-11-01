@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
            <h1>Welcome {{ auth()->user()->name }}</h1>
            <hr>
            <h3>Manage Articles: <a href="{{ route('articles.index') }}">List of Articles</a></h3>
            <h3>Manage Categories: <a href="{{ route('categories.index') }}">List of Categories</a></h3>
            <h3>Manage Tags: <a href="{{ route('tags.index') }}">List of Tags</a></h3>
        </div>
    </div>
</div>
@endsection
