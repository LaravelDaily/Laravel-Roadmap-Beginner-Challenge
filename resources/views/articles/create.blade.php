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
                        <h3 class="box-title">Add Article</h3>
                    </div>
                    <br>
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <h5>Article Title</h5>
                                    <div class="controls">
                                        <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                                        @error('title')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <h5>Article Body</h5>
                                    <div class="controls">
                                        <textarea name="body" cols="10" rows="5" class="form-control">{{ old('body') }}</textarea>
                                        @error('body')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <h5>Article Image</h5>
                                    <div class="controls">
                                        <input type="file" name="image" class="form-control">
                                        @error('image')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <h5>Article Category</h5>
                                    <div class="controls">
                                        <select name="category_id" class="form-select"
                                            aria-label="Default select example">
                                            <option disabled selected>Select Category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <div class="help-block"></div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <h5>Article Tags</h5>
                                    <div class="controls">
                                        <select name="tag[]" class="js-example-basic-multiple form-select" multiple="multiple">
                                            @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('tag'))
                                        <span class="text-danger">{{$errors->first('tag')}}</span>
                                        @endif
                                            
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
<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2();
    });
</script>
@endsection
