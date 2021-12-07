@extends('layouts.template')

@section('content')
    <div class="container"> 
        <h1 class="standard pl-4">Oferty pracy</h1>
        <div class="container">
            <div class="row">
                <!-- Left panel -->
                <div class="col-9">
                    <div id="app">
                        <offers-left-middle-merged data="{{ json_encode($leftBarData) }}"></offers-left-middle-merged>
                    </div>
                </div>
                <!-- Right panel -->
                <div class="col-3">
                    <div class = "widget-offer">
                        <h3 class="widget-title">
                            <span class="border-bottom">Ostatni pracodawcy</span>
                        </h3>   
                        <ul>
                            @foreach ($employers as $employer)
                                <li>{{ $employer->name }}</li>
                            @endforeach
                        </ul>
                        <h3 class="widget-title">
                            <span class="border-bottom">Statystyki</span>
                        </h3>
                        <div class="text-center pb-5">
                            <div class="bg-secondary p-4">
                                <div class="text-light fs-2">{{ $employersCount }}</div>
                                <div class="uppercase text-warning">Pracodawcy</div>
                            </div>
                            <div class="bg-secondary p-4">
                                <div class="text-light fs-2">0</div>
                                <div class="uppercase text-warning">Utworzono CV</div>
                            </div>
                            <div class="bg-secondary p-4">
                                <div class="text-light fs-2">{{ $countOffer }}</div>
                                <div class="uppercase text-warning">Opublikowane prace</div>
                            </div>
                        </div>
                        <h3 class="widget-title">
                            <span class="border-bottom">Ostatnie prace</span>
                        </h3>
                        <ul>
                            @foreach ($offersRightPanel as $offerRightPanel)
                                <li>
                                    <a class="fw-bold text-dark" href="/oferty/{{ $offerRightPanel->slug }}">{{ $offerRightPanel->title }}</a><br>
                                    opublikowano w <a class="text-success" href="/category/{{ $offerRightPanel->industryTable->id }}">{{ $offerRightPanel->industryTable->name }}</a> 
                                </li>                   
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection