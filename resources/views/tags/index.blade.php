@extends('layout.layout')

@section('title')
    Tags
@endsection

@section('content')
    <main class="container mt-5 px-5">
        @error('error')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror

        <a href="{{ route('tags.create') }}" class="btn btn-success">Add Tag</a>
        <section class="container border rounded px-0 mt-3">
            <h4 class="border-bottom px-4 py-2 bg-secondary bg-opacity-10">Tags</h4>
            <ul class="list-group">
                <li class="list-group-item">Name</li>
                @foreach ($tags as $tag)
                    <li class="list-group-item container d-flex">
                        <p class="col-6">{{ $tag->name }}</p>
                        <div class="mx-3">
                            <a href="{{ route('tags.edit', ['tag' => $tag->id]) }}" class="btn btn-primary">Edit</a>
                        </div>
                        <form action="{{ route('tags.destroy', ['tag' => $tag->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </section>
    </main>
@endsection
