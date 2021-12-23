@extends('layouts.template')

@section('head')

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
      selector: '#content'
    });
  </script>

@endsection

@section('content')

<div class="container mt-5">
    @include('components.show_errors')
    @include('components.show_message')
    <div>
        <form action="/artykuly/{{ $article->slug }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="title">Tytuł</label>
            <input class="w-full" type="text" name="title" id="title" value="{{ $article->title }}">
            <label for="content">Zawartość</label>
            <textarea id="content" name="content">{{ $article->content }}</textarea>    
            <label for="photo">Zdjęcie</label>
            <div class="input-group" id="photo">
                <input type="file"  name="image"  class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Wyślij</button>
              </div>
        </form>
    </div>
</div>
@endsection
