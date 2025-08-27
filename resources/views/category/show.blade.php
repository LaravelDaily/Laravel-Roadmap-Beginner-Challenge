@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="display-6">Categories</h1>
        <a href={{ route('categories.edit', $category->id) }} class="btn btn-primary">Edit Categories</a>
    </div>
    <h3>Category Name: {{ $category->name }}</h3>

    <div class="d-flex justify-content-between align-items-center my-5">
        <a href={{ route('categories.index') }} class="btn btn-primary">Check More Categories</a>
        <form action={{ route('categories.destroy', $category->id) }} method="POST">
            @csrf
            @method('DELETE')
            <p>You don't like the Category Again?</p>
            <button type="submit" class="btn btn-danger">Delete Me</button>
        </form>
    </div>
@endsection
