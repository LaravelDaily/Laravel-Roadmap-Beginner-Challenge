@extends('layouts.main') 
@section('styles')
<style>
    ul li{
        line-height: 30px;
    }
</style>
@stop
@section('content')
<div class="container">
    <p> This is laravel simple blog website created by <strong>Emad Aldin Ali</strong> to test laravel skills</p>
    <h5>the flowing topics has been covered in this test:</h5>
    <ul>
        <li>creating models, views and controllers </li>
        <li>creating migration files</li>
        <li>creating model factories and database seeders to seed the database</li>
        <li>laravel form request to validate the data</li>
        <li>model relationships</li>
        <li>file upload to local storage</li>
        <li>view layouts</li>
        <li>laravel authentication</li>
    </ul>
</div>
@endsection