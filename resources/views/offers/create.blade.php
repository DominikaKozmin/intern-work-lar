@extends('layouts.template')

@section('head')

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

<div class="container mt-5">
    @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
    @endif  
    <div>
        <form action="/oferty" method="POST" enctype="multipart/form-data">
            @csrf
            Tytuł<br>
            <input class="w-full" type="text" name="title" placeholder="Tytuł..."><br><br>
            Wynagrodzenie<br>
            <input class="w-full" type="text" name="salary" placeholder="Wynagrodzenie..."><br><br>
            Branża<br>
            <input class="w-full" type="text" name="industry" placeholder="Branża..."><br><br>
            Czas trwania oferty<br>
            <input class="w-full" type="date" name="deadline" placeholder="Tytuł..."><br><br>
            Opis<br>
            <textarea id="content" name="content"></textarea><br>
            <div class="input-group">
                <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Wyślij</button>
            </div>
        </form>
    </div>
</div>
@endsection
