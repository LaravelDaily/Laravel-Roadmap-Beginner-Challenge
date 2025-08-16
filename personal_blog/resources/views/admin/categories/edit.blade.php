@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('edit category') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.categories.update', $category->id)}}">
                            @csrf
                            @method('put')
                            <x-forms.input :name="'title'" :old_record="$category->title"></x-forms.input>
                            <x-forms.submit></x-forms.submit>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
