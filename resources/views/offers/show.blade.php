@extends('layouts.template')

@section('head')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
@endsection

@section('content')
    <div class="container">
        <div class="standard"><a href="/">Start</a> > <a href="/oferty">Oferty pracy</a> > {{ $offer->title }}
            <h1 class="">{{ $offer->title }}</h1>
        </div>   
    
        <div class="row">
            <div class="col-8 bg-white">
                <div class="row text-center">
                    <div class="col border-bottom border-end py-4 px-5">Lokalizacja:</div>
                    <div class="col border-bottom py-4 px-5">Wynagrodzenie:</div>
                </div>
                <div class="row text-center">
                    <div class="col border-bottom border-end py-4 px-5">Typ pracy:</div>
                    <div class="col border-bottom py-4 px-5">Opublikowano:</div>
                </div>
                <div class="row text-center">
                    <div class="col border-bottom border-end py-4 px-5">Kategoria:</div>
                    <div class="col border-bottom py-4 px-5">Termin ostateczny:</div>
                </div>
                <div class="row text-center">
                    <div class="col border-bottom border-end py-4 px-5">Języki:</div>
                    <div class="col py-4 px-5"></div>
                </div>
                <div class="px-5">
                    {!! $offer->content !!}
                    
                    <div class="border-bottom">
                        <div id="mapid" style="width: 600px; height: 400px;"></div>
                        <script>

                            var mymap = L.map('mapid').setView([52.40688, 16.93752], 15);

                            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                                maxZoom: 18,
                                attribution: 'SIEEEMA Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                                id: 'mapbox/streets-v11',
                                tileSize: 512,
                                zoomOffset: -1
                            }).addTo(mymap);

                        </script>
                    </div>
                    <div>Udostępnij:</div>
                </div>
            </div>
            <div class="col-4">

            </div>
        </div>

    </div>
    {{ $offer }}
@endsection