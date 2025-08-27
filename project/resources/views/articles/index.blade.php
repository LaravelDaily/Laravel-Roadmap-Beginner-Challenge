@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container">
        @auth
            <a href="{{ route('articles.create') }}" type="button" class="btn btn-secondary mb-2">Create Article</a>
        @endauth
        <x-card title="Articles">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->author->name }}</td>
                            <td>
                                <a href="{{ route('articles.show', $article->id) }}" type="button"
                                    class="btn btn-info">View</a>
                                @auth

                                    @if ($article->author == auth()->user() || auth()->user()->is_admin)
                                        <a href="{{ route('articles.edit', $article->id) }}" type="button"
                                            class="btn btn-dark">Edit</a>
                                        <form style="display: inline-block" method="POST"
                                            action="{{ route('articles.destroy', $article->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    @endif
                                @endauth

                            </td>
                        </tr>
                    @endforeach
                </tbody>
                {{ $articles->links() }}
            </table>
        </x-card>
    </div>
@endsection
