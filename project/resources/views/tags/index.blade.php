@extends('layouts.app')
@section('title', 'Tags')
@section('content')
    <div class="container">
        @auth
            <a href="{{ route('tags.create') }}" type="button" class="btn btn-secondary mb-2">Create Tag</a>
        @endauth

        <x-card title="tags">


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $tag->name }}</td>
                            <td>
                                <a href="{{ route('tags.edit', $tag) }}" type="button" class="btn btn-dark">Edit</a>
                                <form style="display: inline-block" method="POST"
                                    action="{{ route('tags.destroy', $tag) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                {{ $tags->links() }}

            </table>
        </x-card>
    </div>
@endsection
