@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Articles Details <a href="{{ route('articles.index') }}"
                        class="btn btn-outline-success btn-sm">Back</a></h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $article->id }}</td>
                                </tr>
                                <tr>
                                    <th>Title</th>
                                    <td>{{ $article->title }}</td>
                                </tr>
                                <tr>
                                    <th>Full Text</th>
                                    <td>{{ $article->fulltext }}</td>
                                </tr>
                                <tr>
                                    <th>Image</th>
                                    <td><img src="{{ $article->getFirstMediaUrl('images') }}"></td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>{{ $article->category->title }}</td>
                                </tr>
                                <tr>
                                    <th>Tags</th>
                                    <td>
                                        @forelse ($article->tags as $tag)
                                            {{ $tag->title }} ,
                                        @empty

                                        @endforelse

                                    </td>
                                </tr>
                                <tr>
                                    <th>Created On</th>
                                    <td>{{ $article->created_at->format('d-m-Y H:i') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
