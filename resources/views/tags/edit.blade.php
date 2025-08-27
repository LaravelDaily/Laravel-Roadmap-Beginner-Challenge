@extends('layouts.app')

@section('content')
    <h1 class="text-center">Edit Tag</h1>
    <form action="{{ route('tags.update', $tag->id) }}" method="POST" style="margin: 0 15rem;" class="mt-5">
        @csrf
        @method('PUT')
        <input type="text" name="name" id="name" class="form-control mb-3" placeholder="Tag Name"
            value="{{ $tag->name }}">
        <button type="submit" class="btn btn-primary">Edit Tag</button>
    </form>
@endsection
