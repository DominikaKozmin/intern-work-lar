@extends('layouts.template')

@section('content')
<section>
    <div class="sl-accommodation" style = "linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)); background-image: url({{ URL::asset('img/slider.jpg') }});">
      <div class="dark">
        <div class="container">
          <h1 class = "header-acc justify-content-center"><span style= "color:#2980b9;">Znajdź</span> zakwaterowanie</h1>
            <p class = "slider">Przeszukaj naszą bazę mieszkań i pokoi w całej Polsce.</p>
        </div>
      </div>
    </div>
      </section>
  <div class="container">
      <div class="adverts-options">
          <div class="advert">
            <div class="input-group">
              <input type="search" class="form-control rounded" placeholder="Słowo kluczowe..." aria-label="Search"
                aria-describedby="search-addon" />
            </div>
            <div class="input-group">
              <input type="search" class="form-control rounded" placeholder="Lokalizacja..." aria-label="Search"
                aria-describedby="search-addon" />
            </div>
          </div>
          <button type="button" class="btn btn-outline-primary">Szukaj 
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg>
          </button>
      </div>
  </div>
@endsection