@extends('layout.layout')

@section('title')
    Categories
@endsection

@section('content')
    <main class="container mt-5 px-5">
        @error('error')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror

        <a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>
        <section class="container border rounded px-0 mt-3">
            <h4 class="border-bottom px-4 py-2 bg-secondary bg-opacity-10">Categories</h4>
            <ul class="list-group">
                <li class="list-group-item">Name</li>
                @foreach ($categories as $category)
                    <li class="list-group-item container d-flex">
                        <p class="col-6">{{ $category->name }}</p>
                        <div class="mx-3">
                            <a href="{{ route('categories.edit', ['category' => $category->id]) }}"
                                class="btn btn-primary">Edit</a>
                        </div>
                        <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
            {{ $categories->links() }}
        </section>
    </main>
@endsection
