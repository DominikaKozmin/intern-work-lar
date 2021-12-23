@extends('layouts.template')
@section('head')
    @include('components.tinymce')
@endsection
@section('content')
    <div class="container mt-5">
        @include('components.show_errors')
        <div>
            <form action="/artykuly" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="title">Tytuł</label>
                <input class="w-full mb-3" type="text" name="title" id="title" placeholder="Tytuł...">
                <label for="content">Zawartość</label>
                <textarea id="content" name="content"></textarea>
                <label class="mt-3" for="photo">Zdjęcie</label>
                <div class="input-group" id="photo">
                    <input type="file"  name="image"  class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Wyślij</button>
                </div>
            </form>
        </div>
    </div>
@endsection
