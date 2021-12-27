@extends('layouts.template')

@section('content')
<div class="container">
    <div>
        <h3 class = "main-title font-weight-bold">Znajdź pracę</h3>
    </div> 
    <div class="pb-5">
        <div id="app2">
            <main-page-search></main-page-search>
        </div>
    </div>
    <div>
        <div class="mb-5 pb-5">
            <div id="app">
                @php
                    foreach ($offers as $offer) {
                        $_ = $offer->user;
                    }
                    foreach ($highlightedOffers as $highlightedOffer) {
                        $_ = $highlightedOffer->user;
                    }
                @endphp
                <vue-test :latest-offers="{{ $offers }}" :highlighted-offers="{{ $highlightedOffers }}"></vue-test>
            </div>
        </div>
            <div id="app1">
                <partners></partners>
            </div>
        <div class="row justify-content-around text-center rounded-pill">
            <div class="col-4">
            <em>Jestem</em>
            <h3 class = "text-present">Pracodawcą</h3>
            <div class="text">Dodawaj ogłoszenia pracy oraz szukaj pracowników</div>
            <a href="/register-employer" class="button">Zarejestruj firmę</a>
            </div>
            <div class="col-4">
                <em>Jestem</em>
                <h3 class = "text-present">Pracownikiem</h3>
                <div class="text">Przeszukaj bazę ofert pracy, aplikuj, zapisuj na później...</div>
                <a href="/register-employee" class="button">Zarejestruj się jako kandydat</a>
            </div>
        </div>
        <h3 class = "pTitle text-center">Centrum aktualności</h3>
        <div class="text">Tutaj możesz śledzić najnowsze newsy ze świata pracy</div>
        @include('components.latest_articles_horizontal')
    </div> 
</div>
@endsection