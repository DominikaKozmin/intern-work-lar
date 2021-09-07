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
    <main class="sm:container sm:mx-auto sm:mt-10">
        @if ($errors->any())
        <div class="w-4/5 m-auto">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    Tytuł
    <div>
        <form action="/artykuly" method="POST" enctype="multipart/form-data">
            @csrf
            <input class="w-full" type="text" name="title" placeholder="Tytuł..."><br><br>
            Zawartość<br>
            <textarea id="content" name="content"></textarea><br>
            Zdjęcie
            <div class="input-group">
                <input type="file"  name="image"  class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04">Wyślij</button>
              </div>
        </form>
    </div>
    </main>
</div>
@endsection
