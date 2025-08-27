@extends('layouts.app')
@section('title', 'Categories')
@section('content')
    <div class="container">
        @auth
            <a href="{{ route('categories.create') }}" type="button" class="btn btn-secondary mb-2">Create Category</a>
        @endauth

        <x-card title="Categories">


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category) }}" type="button"
                                    class="btn btn-dark">Edit</a>
                                <form style="display: inline-block" method="POST"
                                    action="{{ route('categories.destroy', $category) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                {{ $categories->links() }}

            </table>
        </x-card>
    </div>
@endsection
