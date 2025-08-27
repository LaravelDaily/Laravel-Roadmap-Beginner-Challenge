@extends('layouts.app')

@push('css')
    <style>
        .card-header-with-button {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-with-button">
                        {{ __('Articles') }}
                        <a href="{{route('backend.articles.create') }}" class="btn btn-success">{{ __('Create') }}</a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">{{ __('Title') }}</th>
                                <th scope="col">{{ __('Category') }}</th>
                                <th scope="col">{{ __('Total Tags') }}</th>
                                <th scope="col">{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($articles as $article)
                                <tr>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->category->name }}</td>
                                    <td>{{ $article->tags_count }}</td>
                                    <td>
                                        <a href="{{ route('articles.show', $article) }} " target="_blank"
                                           class="btn btn-primary btn-sm">{{ __('Show') }}</a>
                                        <a href="{{ route('backend.articles.edit', $article) }}"
                                           class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
                                        <form action="{{ route('backend.articles.destroy', $article->id) }}"
                                              method="POST"
                                              class="d-inline-block"
                                              onsubmit="return confirm('{{ __('Are you sure you want delete this?') }}');">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger btn-sm"
                                                   value="{{ __('Delete') }}">
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">{{ __('No articles found!') }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
