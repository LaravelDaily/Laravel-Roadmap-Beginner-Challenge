@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Tags</h1>
        <a href={{ route('tags.edit', $tag->id) }} class="btn btn-primary">Edit Tag</a>
    </div>
    <div class="my-5">
        <h3>Tag Name: {{ $tag->name }}</h3>
    </div>
@endsection
