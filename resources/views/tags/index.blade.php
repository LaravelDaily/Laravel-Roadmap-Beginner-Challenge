@extends('boilerplate')
@section('content')
<br>
<div class="container-full m-10">

    <!-- Main content -->
    <section class="content">
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
        @endif
        <div class="row ">
            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tags </span></h3>
                    </div>
                    <br>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table  class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th colspan="2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tags as $tag)
                                    <tr>
                                        <td >{{ $tag->name }}</td>
                                        <td>
                                            <a href="{{ route('tags.edit',$tag->id) }}"
                                                class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                                        </td>
                                                <td>  
                                            
                                              
                                                <form method="POST" action="{{ route('tags.destroy',$tag->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('are you sure ?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                           
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3">No tags found</td>
                                    </tr>
                                    @endforelse
                                   
                                </tbody>

                            </table>
                            
                        </div>
                    </div>
                    {{ $tags->links() }}
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add tag</h3>
                    </div>
                    <br>
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('tags.store') }}">
                                @csrf
                                <div class="form-group">
                                    <h5>Tag Name</h5>
                                    <br>
                                    <div class="controls">
                                        <input type="text" name="name" class="form-control">
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <br>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Add">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection
