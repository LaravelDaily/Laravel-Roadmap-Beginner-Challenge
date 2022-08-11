@extends('boilerplate')
@section('content')
<br>
<div class="container-full m-10">
    <!-- Main content -->
    <section class="content">
        <div class="row ">
            <div class="col-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Category</h3>
                        <br>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">

                            <form method="POST" action="{{ route('categories.update',$category->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <h5>Category Name</h5>
                                    <br>
                                    <div class="controls">
                                        <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <br>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Update">
                                    <span>
                                        <a class="btn btn-rounded btn-danger" href="{{ route('categories.index') }}">Back</a>
                                     </span>
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
