@extends('template')

@section('content')
<section>
<div class="bgimage" style = " linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)); background-image: url({{ URL::asset('img/pracodawca.jpg') }});">
  <div class="dark">
    <div class="container">
      <h1>Strefa pracodawcy</h1>
        <div class="row justify-content-center">
          <div class="col-4 text-center">
            <a href="#" class="button">Logowanie</a>
          </div>
          <div class="col-4 text-center">
            <a href="#" class="button">Rejestracja</a>
          </div>
        <h2 class="slider">Przeszukaj naszą bazę pracowników i znajdź kogoś dla swojej firmy!</h1>
      </div>
  </section>

  <div class="container">

    <h3 class = "pTitle text-center">Zarejestruj się, wybierz i kup pakiet aby otrzymać pełny dostęp...</h3>
    <div class="text">... do profili zawodowych Pracowników z Ukrainy!</div>

    <div class="row justify-content-around text-center">
      <div class="pay-cv col-md-4">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="grey" class="bi bi-person-fill" viewBox="0 0 16 16">
              <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            </svg>
              <h3><span style="color: rgb(41, 128, 185);">Pakiet CV -</span> MINI 7<br />70 zł</h3>
            </div>
            <div class="cv-container text-center">
              <div class="separator"></div>
              <p>
                Ta oferta pozwala na pełny dostęp do 7 profili kandydatów w tym informacje kontaktowe do kandydata oraz jego CV.
              </p>
              <a href="#" class="btn-cv">Kup teraz</a>
            </div>
        </div>
      <div class="pay-cv col-md-4">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="grey" class="bi bi-people-fill" viewBox="0 0 16 16">
              <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
              <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
            </svg>
            <h3><span style="color: rgb(41, 128, 185);">Pakiet CV -</span> STANDARD 30 <br />150 zł</h3>
          </div>
          <div class="cv-container text-center">
            <div class="separator"></div>
            <p>
              Ta oferta pozwala na pełny dostęp do 30 profili kandydatów w tym informacje kontaktowe do kandydata oraz jego CV.
            </p>
            <a href="#" class="btn-cv">Kup teraz</a>
          </div>
      </div>
      <div class="pay-cv  col-md-4">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="grey" class="bi bi-people-fill" viewBox="0 0 16 16">
              <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
              <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
            </svg>
            <h3><span style="color: rgb(41, 128, 185);">Pakiet CV -</span> PREMIUM 120 <br />200 zł</h3>
          </div>
          <div class="cv-container text-center">
            <div class="separator"></div>
            <p>
              Ta oferta pozwala na pełny dostęp do 120 profili kandydatów w tym informacje kontaktowe do kandydata oraz jego CV.
            </p>
            <a href="#" class="btn-cv">Kup teraz</a>
          </div>
      </div>
  </div>


  </div>

  <br/><br/><br/>


@endsection