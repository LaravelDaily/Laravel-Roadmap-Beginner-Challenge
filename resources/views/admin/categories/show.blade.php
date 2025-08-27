@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Category Details <a href="{{ route('categories.index') }}"
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
                                    <td>{{ $category->id }}</td>
                                </tr>
                                <tr>
                                    <th>Title</th>
                                    <td>{{ $category->title }}</td>
                                </tr>
                                <tr>
                                    <th>Created On</th>
                                    <td>{{ $category->created_at->format('d-m-Y H:i') }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <br><br>
                        <h6>Articles in the Category</h6>
                        @forelse ( $category->articles as $article )
                        <p><a href="{{ route('articles.show',$article->id) }}">{{ $article->title }}</a></p>
                        @empty
                        No Article Found
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
