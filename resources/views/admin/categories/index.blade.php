@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2 class="d-inline">Categories</h2>
                    <span class="float-end">
                        <a class="btn btn-primary" data-toggle="collapse" href="{{ route('admin.categories.create') }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Add Category
                        </a>
                    </span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Category</th>
                                <th scope="col" class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $category->name }}</td>
                                <td class="text-end">
                                    <a class="btn btn-info" data-toggle="collapse" href="{{ route('admin.categories.edit', $category->id) }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
