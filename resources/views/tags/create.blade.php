@extends('layouts.app')

@section('content')
    <h1 class="text-center">Create A Tag</h1>
    <form action="{{ route('tags.index') }}" method="POST" style="margin: 0 15rem;" class="mt-5">
        @csrf
        <input type="text" name="name" id="name" class="form-control mb-3" placeholder="Tag Name">
        <button type="submit" class="btn btn-primary">Create Tag</button>
    </form>
@endsection
