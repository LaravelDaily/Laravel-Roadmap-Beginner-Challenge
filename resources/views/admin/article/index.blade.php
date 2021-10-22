@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>List of all articles</h2>
                    <div>
                        <a class="btn btn-success" href="{{ route('articles.create') }}">New</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('admin.includes.alerts')
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></td>
                            <td><span class="badge badge-primary">{{ $article->category->name ?? '' }}</span></td>
                            <td class="d-flex">
                                <a class="btn btn-warning mr-2" href="{{ route('articles.edit', $article) }}">Edit</a>
                                <form class="d-inline-block" action="{{ route('articles.destroy', $article) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <p>No articles to display</p>
                    @endforelse
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
