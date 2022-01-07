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

<div class="container mt-5">
    @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
    @endif
    @include('components.show_message')  
    <div>
        <form action="/oferty/{{ $offer->slug }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="title">Tytuł</label>
            <input class="w-full" type="text" name="title" id="title" placeholder="Tytuł..." value="{{ $offer->title }}">
            <label for="salary">Wynagrodzenie</label>
            <input class="w-full" type="text" name="salary" id="salary" placeholder="Wynagrodzenie..." value="{{ $offer->salary }}">
            <label for="industry">Branża</label>
            <select class="d-block" name="industry" id="industry" selected=>
                @foreach ($industries as $industry)
                    @if($industry->id!=$offer->industry)
                        <option value="{{ $industry->id }}">{{ $industry->name }}</option> 
                    @else 
                        <option value="{{ $industry->id }}" selected="selected">{{ $industry->name }}</option> 
                    @endif
                @endforeach
            </select>
            <label for="deadline">Czas trwania oferty</label>
            <input class="w-full" type="date" name="deadline" id="deadline" value="{{ $offer->deadline }}">
            <div class="border">
                <label for="abilities">Umiejętności</label>
                <div class="overflow-scroll" id="abilities" style="height: 250px; overflow-x: hidden !important;">
                    @foreach ($abilities as $ability)
                        <label class="form-label" for="">{{ $ability['name'] }}</label>
                        <input class="form-check-input" type="checkbox" name="abilities[]" value="{{ $ability['id'] }}"
                        @if (array_key_exists('checked',$ability)) checked @endif><br>
                    @endforeach
                </div>
            </div>
            <div class="border">
                <label for="levels">Poziomy</label>
                <div class="overflow-scroll"  style="height: 250px; overflow-x: hidden !important;">
                    @foreach ($levels as $level)
                        <label class="form-label" for="">{{ $level['name'] }}</label>
                        <input class="form-check-input" type="checkbox" name="levels[]" value="{{ $level['id'] }}"
                        @if (array_key_exists('checked',$level)) checked @endif><br>
                    @endforeach
                </div>
            </div>
            <div class="border">
                <label for="types">Typy</label>
                <div class="overflow-scroll" id="types" style="height: 250px; overflow-x: hidden !important;">
                @foreach ($types as $type)
                    <label class="form-label" for="">{{ $type['name'] }}</label>
                    <input class="form-check-input" type="checkbox" name="types[]" value="{{ $type['id'] }}"
                    @if (array_key_exists('checked',$type)) checked @endif><br>
                @endforeach
                </div>
            </div>
            <label for="content">Opis</label>
            <textarea id="content" name="content">{{ $offer->content }}</textarea>
            <div class="input-group">
                <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Wyślij</button>
            </div>
        </form>
    </div>
</div>
@endsection
