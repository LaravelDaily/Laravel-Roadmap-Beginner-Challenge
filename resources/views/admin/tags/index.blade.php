@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tags <a href="{{ route('tags.create') }}" class="btn btn-outline-success btn-sm">Add New</a></h1>
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
                                    <th>Created On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($tags as $tag)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $tag->title }}</td>
                                        <td>{{ $tag->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <form method="post" action="{{ route('tags.destroy', $tag->id)}}">
                                                @csrf @method('DELETE')
                                                <a href="{{ route('tags.show', $tag->id) }}" class="btn  btn-info btn-sm">View</a>
                                                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary btn-sm">Edit</a>
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
                        {{-- {!! $tags->links() !!} --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
