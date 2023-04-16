@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Tags</h1>
        <a href={{ route('tags.create') }} class="btn btn-primary">Create A Tag</a>
    </div>
    @if ($tags)
        <ul class="list-group my-5">
            @foreach ($tags as $tag)
                @if ($tag)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $tag->name }}
                        <div class="d-flex justify-content-between align-items-center">
                            <a href={{ route('tags.show', $tag->id) }} class="btn btn-primary me-2">
                                View Tag
                            </a>
                            <form action={{ route('tags.destroy', $tag->id) }} method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    Delete Me
                                </button>
                            </form>
                        </div>
                    </li>
                @else
                    <p class="text-center">No Tags Found</p>
                @endif
            @endforeach
        </ul>
    @else
        <p class="text-center">No Tags Found</p>
    @endif
@endsection
