@extends('template')

@section('content')
<div class="container">
    <div>
        <strong><h3 class = "main-title">Znajdź pracę</h3></strong>
    </div>
    <div>
    <div class="row justify-content-around">
        <div class="gray-box col-md-4 ">
            <div>Słowo kluczowe</div>
        </div>
        <div class="gray-box col-md-4">
            <div>Gdzie</div>
        </div>
        <div class="gray-box col-md-4">
            <div>Branża</div>
        </div>
    </div>
    <br/>
    <br/>
    <br/>
    <div class="row justify-content-around text-center">
        <div class="col-4">
          <em>Jestem</em>
          <h3 class = "text-present">Pracodawcą</h3>
          <div class="text">Dodawaj ogłoszenia pracy oraz szukaj pracowników</div>
          <a href="/login" class="button">Zarejestruj firmę</a>
        </div>
        <div class="col-4">
            <em>Jestem</em>
            <h3 class = "text-present">Pracownikiem</h3>
            <div class="text">Przeszukaj bazę ofert pracy, aplikuj, zapisuj na później...</div>
            <a href="/login" class="button">Zarejestruj się jako kandydat</a>
        </div>
      </div>

    <h3 class = "pTitle text-center">Centrum aktualności</h3>
    <div class="text">Tutaj możesz śledzić najnowsze newsy ze świata pracy</div>
    @include('components.latest_articles_horizontal')
</div>


    
</div>
@endsection