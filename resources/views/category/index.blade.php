@extends('partials.master')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1>Categories List</h1>
        </div>
        @auth
            <div class="col-sm-12">
                <a href="{{ route('categories.create') }}" type="button" class="btn-sm btn-info">Add category</a>
            </div>
        @endauth
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('categories.edit',['category' => $category]) }}" type="button" class="btn-sm btn-success">Edit</a>
                                <form class="btn btn-sm" action="{{ route('categories.destroy', ['category' => $category]) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" onclick="return checkDelete()" class="btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
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
