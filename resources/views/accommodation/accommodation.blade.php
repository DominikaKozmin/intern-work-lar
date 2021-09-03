@extends('template')

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
@endsection