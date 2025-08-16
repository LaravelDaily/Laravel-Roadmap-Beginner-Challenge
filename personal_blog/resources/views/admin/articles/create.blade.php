@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('articles') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.articles.store')}}" enctype="multipart/form-data">
                            @csrf
                            <x-forms.input :name="'title'" :old_record="''"></x-forms.input>
                            <x-forms.text-area :name="'description'" :old_record="''"></x-forms.text-area>
                            <x-forms.file :name="'image'"></x-forms.file>
                            <x-forms.category-select :old_value="''"></x-forms.category-select>
                            <x-forms.tags-select :old_value="collect()"></x-forms.tags-select>
                            <x-forms.submit></x-forms.submit>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endpush
