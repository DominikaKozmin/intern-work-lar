@extends('layouts.template')

@section('content')
    <section>
        <div class="bgimage"
            style=" linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)); background-image: url({{ URL::asset('img/pracownik.jpg') }});">
            <div class="dark">
                <div class="container">
                    <h1>Strefa pracownika</h1>
                    <h2>Zaloguj się lub zarejestruj, by stworzyć profil kandydata</h2>
                    <div class="row justify-content-center">
                        <div class="col-4 text-center">
                            <a href="/login" class="button">Logowanie</a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="/register-employee" class="button">Rejestracja</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <h3 class="pTitle text-center justify-content-center">Jak to działa?</h3>
        <div class="row pb-5">
            <div class="map-container col-md-4 justify-content-center text-center">
                <div>
                    <span class="step-icon" style="color:#2980b9">1</span>
                    <h3>Zarejestruj się</h3>
                    <p class="paraTitle">Dodaj najważniejsze informacje o sobie tak, aby pracowadwcy mogli łatwo cię
                        znaleźć...</p>
                </div>
            </div>
            <div class="map-container col-md-4 justify-content-center text-center">
                <div>
                    <span class="step-icon" style="color:#16a085">2</span>
                    <h3>Wyszukuj oferty</h3>
                    <p class="paraTitle">Przeglądaj oferty według wielu różnych kryteriów, zapisuj ciekawe oferty, by
                        móc do
                        nich później wrócić.</p>
                </div>
            </div>
            <div class="map-container col-md-4  text-center">
                <div>
                    <span class="step-icon" style="color:#e67e22">3</span>
                    <h3>Aplikuj</h3>
                    <p class="paraTitle">Dzięki stworzonemu na naszej platformie profilowi, możesz szybko i łatwo
                        aplikować
                        na wiele stanowisk.</p>
                </div>
            </div>
        </div>

        <div class="mb-5 pb-5">
            <div id="app">
                @php
                    // Without loop below user data won't be passed to vue component
                    // FIXME: I'm preaty sure that there is a better way to fix this problem.
                    foreach ($offers as $offer) {
                        $_ = $offer->user->name;
                    }
                    foreach ($highlightedOffers as $highlightedOffer) {
                        $_ = $highlightedOffer->user->name;
                    }
                @endphp
                <vue-test :latest-offers="{{ $offers }}" :highlighted-offers="{{ $highlightedOffers }}"></vue-test>
            </div>
        </div>
    </div>
    <div class="backgroundNewspapers">
        <div class="d-flex justify-content-center align-items-center h-full">
            Centrum Aktywności
        </div>
    </div>
    @include('components.latest_articles_horizontal')


@endsection
