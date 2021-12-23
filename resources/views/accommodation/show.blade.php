@extends('layouts.template')

@section('head')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
@endsection

@section('content')
    <div class="container">
        <div class="standard"><a href="/">Start</a> > <a href="/oferty">Oferty pracy</a> > {{ $accommodation->title }}
            <h1 class="">{{ $accommodation->title }}</h1>
        </div>   

        <div class="row">
            <div class="col-8 bg-white">
                <div class="flex">
                    <img src="{{ asset('storage/accommodations_images/'. $accommodation->photo[0]->path) }}" alt="">
                </div>
                <div class="row text-center">
                    <div class="col border-bottom border-end py-4 px-5">Miasto: {{ $accommodation->city->name }}</div>
                    <div class="col border-bottom py-4 px-5">Cena: {{ $accommodation->price }}zł</div>
                </div>
                <div class="row text-center">
                    <div class="col border-bottom border-end py-4 px-5">Liczba pokoi:  {{ $accommodation->rooms }}</div>
                    <div class="col border-bottom py-4 px-5">Metry kwadratowe: {{ $accommodation->square_meters }}</div>
                </div>
                <div class="">
                    {!! $accommodation->content !!}
                    
                    <div>
                        <div id="mapid" style="width: 600px; height: 300px;"></div>
                        <script>
                            var mymap = L.map('mapid').setView([52.40688, 16.93752], 15);

                            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                                maxZoom: 18,
                                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                                id: 'mapbox/streets-v11',
                                tileSize: 512,
                                zoomOffset: -1
                            }).addTo(mymap);
                        </script>
                    </div>
                    <p>Dodano {{ $accommodation->created_at }}</p>
                </div>
                @if (Auth::check())
                <form class="d-inline-block float-end" action="/zakwaterowanie/{{ $accommodation->slug }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Usuń</button>
                </form>
                <a class="btn btn-info float-end" href="/zakwaterowanie/{{ $accommodation->slug }}/edit/">Edytuj</a>
            @endif
            </div>
        <div class="col-4">
            <div class="bg-white p-5 ">
                <div class="text-center border-bottom pb-5 mb-5">
                    <img class="d-inline-block pb-4" src="{{ asset('img/images/user.png') }}" alt=""><br>
                    <p class="fs-1">{{ $accommodation->user->name }}</p> 
                </div>
                <div>
                    <div class="d-flex pb-4"><p class="uppercase fw-bold border-bottom">CONTACT FORM</p></div>
                    <input class="form-control mb-2" type="text" placeholder="Twoje Imię">
                    <input class="form-control mb-2" type="text" placeholder="Twój email">
                    <input class="form-control mb-2" type="text" placeholder="Przedmiot">
                    <textarea class="form-control" name="" id="" cols="30" rows="5" placeholder="Wiadomość"></textarea><br>
                    <input class="btn btn-success" type="button" value="Wyślij teraz">
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
@endsection