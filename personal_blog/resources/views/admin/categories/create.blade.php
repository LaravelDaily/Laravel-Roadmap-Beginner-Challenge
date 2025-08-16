@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('categories') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.categories.store')}}">
                            @csrf
                            <x-forms.input :name="'title'" :old_record="''"></x-forms.input>
                            <x-forms.submit></x-forms.submit>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
