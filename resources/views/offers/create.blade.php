@extends('layouts.template')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('components.tinymce')
@endsection
@section('content')
    <div class="container mt-5">
        @include('components.show_errors')
        <div>
            <form action="/oferty" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="title">Tytuł</label>
                <input class="w-full" type="text" name="title" id="title" placeholder="Tytuł...">
                <label for="salary">Wynagrodzenie</label>
                <input class="w-full" type="text" name="salary" id="salary" placeholder="Wynagrodzenie...">
                <label for="industry">Branża</label>
                <select class="d-block" name="industry" id="industry">
                    @foreach ($industries as $industry)
                        <option value="{{ $industry->id }}">{{ $industry->name }}</option> 
                    @endforeach
                </select>
                <label for="deadline">Czas trwania oferty</label>
                <input class="w-full" type="date" name="deadline" id="deadline" placeholder="Tytuł...">
                <div class="border">
                    <label for="abilities">Umiejętności</label>
                    <div class="overflow-scroll"  style="height: 250px; overflow-x: hidden !important;">
                        @foreach ($abilities as $ability)
                            <label class="form-label" for="">{{ $ability->name }}</label>
                            <input class="form-check-input" type="checkbox" name="abilities[]" value="{{ $ability->id }}" id=""><br>
                        @endforeach
                    </div>
                </div>
                <div class="border">
                    <label for="levels">Poziomy</label>
                    <div class="overflow-scroll" id="levels" style="height: 250px; overflow-x: hidden !important;">
                        @foreach ($levels as $level)
                            <label class="form-label" for="">{{ $level->name }}</label>
                            <input class="form-check-input" type="checkbox" name="levels[]" value="{{ $level->id }}" id=""><br>
                        @endforeach
                    </div>
                </div>
                <div class="border">
                    <label for="types">Typy</label>
                    <div class="overflow-scroll" id="types" style="height: 250px; overflow-x: hidden !important;">
                    @foreach ($types as $type)
                        <label class="form-label" for="">{{ $type->name }}</label>
                        <input class="form-check-input" type="checkbox" name="types[]" value="{{ $type->id }}" id=""><br>
                    @endforeach
                    </div>
                </div>
                <label for="content">Opis</label>
                <textarea id="content" name="content"></textarea>
                <div class="input-group">
                    <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Wyślij</button>
                </div>
            </form>
        </div>
    </div>
@endsection
