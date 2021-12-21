@extends('layouts.template')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: '#content',
      height: 500,
      plugins: 'lists',
      toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | bullist numlist | outdent indent'
    });
</script>

@endsection

@section('content')

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endforeach
@endif  

<div id="app">
    <accommodation-edit data="{{ json_encode($accommodation) }}"></accommodation-edit>
</div>

@endsection
