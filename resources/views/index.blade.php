@extends('layouts.template')

@section('content')
<div class="container">
    <div>
        <strong><h3 class = "main-title">Znajdź pracę</h3></strong>
    </div>
    
    <div>
        <!--
        <div class="d-flex" id="app">
            <drop-test
                :options="[{ id: 1, name: 'Option 1'}, { id: 2, name: 'Option 2'}, { id: 3, name: 'Cat'}]"
                options_1="[{ id: 1, name: 'Option 1'}, { id: 2, name: 'Option 2'}, { id: 3, name: 'Cat'}]"
                options_2="[{ id: 1, name: 'Option 1'}, { id: 2, name: 'Option 2'}, { id: 3, name: 'Cat'}]"
                options_3="[{ id: 1, name: 'Option 1'}, { id: 2, name: 'Option 2'}, { id: 3, name: 'Cat'}]"
                v-on:selected="validateSelection"
                v-on:filter="getDropdownValues"
                name="zipcode"
                :maxItem="10"
                description_1="Słowo kluczowe"
                description_2="Słowo kluczowe"
                description_3="SłowoA kluczowe"
                placeholder_1="Posada, zawód..."
                placeholder_2="Wszystkie kategorie"
                placeholder_3="Wszystkie kategorie">
            </drop-test>
        </div>
        !-->
    </div>
    <div>
    <div class="row justify-content-around mb-5 pb-5">
        <div class="gray-box col-md-4 ">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>Słowo kluczowe
                    <input placeholder="Posada, zawód..." name="keyword" value type="text">
            </div>
        </div>
        <div class="gray-box col-md-4">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>Gdzie
                    <input placeholder="Wszystkie kategorie" name="key-cat" value type="text">
            </div>
        </div>
        <div class="gray-box col-md-4">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>Branża
                    <input placeholder="Wszystkie kategorie" name="key-cat" value type="text">
            </div>
        </div>
    </div>
    
    <div class="mb-5 pb-5">
        <div id="app">
            @php
                        
                // Without loop below user data won't be passed to vue component
                // FIXME: I'm preaty sure that there is a better way to fix this problem.
                foreach ($offers as $offer) {
                    $_ = $offer->user;
                }
                //dd($offers); 
                //dd($offers);
                foreach ($highlightedOffers as $highlightedOffer) {
                    $_ = $highlightedOffer->user;
                }
            @endphp
            <vue-test :latest-offers="{{ $offers }}" :highlighted-offers="{{ $highlightedOffers }}"></vue-test>
        </div>
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