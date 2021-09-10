@extends('template')

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
    @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
    @endif
    Tytuł
    <div>
        <form action="/artykuly/{{ $article->slug }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input class="w-full" type="text" name="title" value="{{ $article->title }}"><br><br>
            Zawartość<br>
            <textarea id="content" name="content">{{ $article->content }}</textarea><br>
            Zdjęcie
            <div class="input-group">
                <input type="file"  name="image"  class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Wyślij</button>
              </div>
        </form>
    </div>
</div>
@endsection
