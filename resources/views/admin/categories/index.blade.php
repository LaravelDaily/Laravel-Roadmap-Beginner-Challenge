@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Categories <a href="{{ route('categories.create') }}" class="btn btn-outline-success btn-sm">Add New</a></h1>
            </div>
        </div>

        @if (session('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Title</th>
                                    <th>No of Articles</th>
                                    <th>Created On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="{{ route('categories.show', $category->id) }}">{{ $category->title }}</a></td>
                                        <td>{{ $category->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $category->articles_count }}</td>
                                        <td>{{ $category->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <form method="post" action="{{ route('categories.destroy', $category->id)}}">
                                                @csrf @method('DELETE')
                                                <a href="{{ route('categories.show', $category->id) }}" class="btn  btn-info btn-sm">View</a>
                                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" align="center">
                                            <p class="text-danger">Sorry, we couldn't find any Tag</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">
                        {!! $categories->links() !!}
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
