@extends('partials.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1>Articles List</h1>
        </div>
        @auth
            <div class="col-sm-12">
                <a href="{{ route('articles.create') }}" type="button" class="btn-sm btn-info">Add Article</a>
            </div>
        @endauth
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Tags</th>
                    <th>Creator</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->category->name }}</td>
                            <td>
                                @foreach ($article->tags as $tag)
                                    <span class="badge badge-success">
                                        {{ $tag->tag->name }}
                                    </span>
                                @endforeach
                            </td>
                            <td>{{ $article->user->name ?? '-' }}</td>
                            <td>
                                <a href="{{ route('articles.show',['article' => $article]) }}" type="button" class="btn-sm btn-info">Show</a>
                                @auth
                                    <a href="{{ route('articles.edit',['article' => $article]) }}" type="button" class="btn-sm btn-success">Edit</a>
                                    <form class="btn btn-sm" action="{{ route('articles.destroy', ['article' => $article]) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" onclick="return checkDelete()" class="btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                @endauth
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>

    <script>
        function checkDelete(){
            return confirm('Are you sure?');
        }

        $(document).ready(function(){
            $("a.delete").click(function(e){
                if(!confirm('Are you sure?')){
                    e.preventDefault();
                    return false;
                }
                return true;
            });
        });
    </script>
@endsection
