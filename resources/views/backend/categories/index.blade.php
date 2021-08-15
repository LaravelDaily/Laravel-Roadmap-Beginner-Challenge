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
                        {{ __('Categories') }}
                        <a href="{{ route('backend.categories.create') }}"
                           class="btn btn-success">{{ __('Create') }}</a>
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
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Total Articles') }}</th>
                                <th scope="col">{{ __('Action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->articles_count }}</td>
                                    <td>
                                        <a href="{{ route('backend.categories.edit', $category) }}"
                                           class="btn btn-primary btn-sm">{{ __('Edit') }}</a>
                                        <form action="{{ route('backend.categories.destroy', $category->id) }}"
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
                                    <td colspan="3" class="text-center">{{ __('No categories found!') }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
