@extends('boilerplate')
@section('content')
<br>
<div class="container-full m-10">

    <!-- Main content -->
    <section class="content">
        <div class="row ">
            <div class="col-9">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Articles <span class="badge badge-pill badge-danger"> </span></h3>
                    </div>
                    <br>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Body</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Tags</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($articles as $article)
                                    <tr>
                                        <td>{{ $article->title}}</td>
                                        <td>{{ Str::limit($article->body, 20 ) }}</td>
                                        <td><img src="{{ asset('storage/article/'.$article->image) }}" height="50px" width="50px"></td>
                                        <td>{{ $article->category->name}}</td>
                                        <td>
                                            @foreach ($article->tags as $tag)
                                            <span class="badge badge-info">{{ $tag->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('articles.edit',$article->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                            <form method="POST" action="{{ route('articles.destroy',$article->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('are you sure ?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    
                                    <tr>
                                        <td colspan="6" class="text-center">No articles found</td>
                                    </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-3">
                <a href="{{ route('articles.create') }}" class="btn btn-primary">Create Article</a>
                <br>
                <br>
                <a href="{{ route('categories.index') }}" class="btn btn-primary">manage Categories</a>
                <br>
                <br>
                <a href="{{ route('tags.index') }}" class="btn btn-primary">manage Tags</a>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection
