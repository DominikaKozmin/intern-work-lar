@extends('layouts.template')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('components.tinymce')
@endsection
@section('content')
    @include('components.show_errors')
    <div id="app">
        <accommodation-create></accommodation-create>
    </div>
@endsection