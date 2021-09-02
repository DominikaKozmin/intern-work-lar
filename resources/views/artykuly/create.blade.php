@extends('template')

@section('content')
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
Stwórz artykuł
<div>
    <form action="/artykuly" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Tytuł..."><br><br>
        <textarea name="content"></textarea><br>
        <input type="file" name="image" class=""><br>
        <button type="submit">Wyślij</button>
    </form>
</div>
</main>
@endsection
