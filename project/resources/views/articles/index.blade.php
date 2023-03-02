@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container">
        @auth
            <a href="{{ route('articles.create') }}" type="button" class="btn btn-secondary mb-2">Create Article</a>
        @endauth

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Articles') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

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

                                            @if ($article->author == auth()->user())
                                                <a href="{{ route('articles.edit', $article->id) }}" type="button"
                                                    class="btn btn-dark">Edit</a>
                                                <form style="display: inline-block" method="POST"
                                                    action="{{ route('articles.destroy', $article->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{ $articles->links() }}

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
