@extends('layouts.app')

@section('content')
    <h1 class="text-center">Edit A Category</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST" style="margin: 0 15rem;" class="mt-5">
        @csrf
        @method('PUT')
        <input type="text" name="name" id="name" class="form-control mb-3" placeholder="Category Name"
            value="{{ $category->name }}">
        <button type="submit" class="btn btn-primary">Edit Category</button>
    </form>
@endsection
