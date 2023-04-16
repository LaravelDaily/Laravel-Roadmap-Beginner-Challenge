@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="my-4 text-center">Categories</h1>
        <a href={{ route('categories.create') }} class="btn btn-primary">Add Categories</a>
    </div>
    @if ($categories)
        <ul class="list-group">
            @foreach ($categories as $category)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between align-items-center">
                        {{ $category->name }}
                        <div class="d-flex justify-items-between align-items-center">
                            <a href={{ route('categories.show', $category->id) }} class="btn btn-primary me-2">View
                                Category</a>
                            <form action={{ route('categories.destroy', $category->id) }} method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete Category</button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-center lead">No Categories Found</p>
    @endif
@endsection
