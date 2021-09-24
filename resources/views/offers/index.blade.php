@extends('layouts.template')

@section('content')
    <div class="container"> 
        <h1 class="standard pl-4">Oferty pracy</h1>
        <div class="container">
            <div class="row">
                <!-- Left panel -->
                <div class="col-3">
                    <div class = "widget-offer">
                        <h3 class="widget-title">
                            <span class="border-bottom">Branża</span>
                        </h3>
                        @foreach ($offersCount as $offerCount)
                            <div class="row border-bottom pb-2 mb-3 hover:border-bottom-blue">
                                <div class="col-9">
                                    <label>
                                        <input type="radio" name="group1" value="Milk">
                                        {{ $offerCount->name }}
                                    </label><br/>
                                </div>
                                <div class="col">
                                    <span class="float-end pl-1">{{ $offerCount->count }}</span>
                                </div>
                            </div>
                        @endforeach
                        <div class="my-4"><a href="#">Pokaż więcej</a></div>
                        <h3 class="widget-title">
                            <span class="border-bottom">Umiejętności</span>
                        </h3>
                        @foreach ($offersCount as $offerCount)
                            <div class="row border-bottom pb-2 mb-3 hover:border-bottom-blue">
                                <div class="col-9">
                                    <label>
                                        <input type="radio" name="group1" value="Milk">
                                        {{ $offerCount->name }}
                                    </label><br/>
                                </div>
                                <div class="col">
                                    <span class="float-end pl-1">{{ $offerCount->count }}</span>
                                </div>
                            </div>
                        @endforeach
                        <div class="my-4"><a href="#">Pokaż więcej</a></div>
                        <h3 class="widget-title">
                            <span class="border-bottom">Poziomy</span>
                        </h3>
                        @foreach ($offersCount as $offerCount)
                            <div class="row border-bottom pb-2 mb-3 hover:border-bottom-blue">
                                <div class="col-9">
                                    <label>
                                        <input type="radio" name="group1" value="Milk">
                                        {{ $offerCount->name }}
                                    </label><br/>
                                </div>
                                <div class="col">
                                    <span class="float-end pl-1">{{ $offerCount->count }}</span>
                                </div>
                            </div>
                        @endforeach
                        <div class="my-4"><a href="#">Pokaż więcej</a></div>
                        <h3 class="widget-title">
                            <span class="border-bottom">Lokalizacja</span>
                        </h3>
                        @foreach ($offersCount as $offerCount)
                            <div class="row border-bottom pb-2 mb-3 hover:border-bottom-blue">
                                <div class="col-9">
                                    <label>
                                        <input type="radio" name="group1" value="Milk">
                                        {{ $offerCount->name }}
                                    </label><br/>
                                </div>
                                <div class="col">
                                    <span class="float-end pl-1">{{ $offerCount->count }}</span>
                                </div>
                            </div>
                        @endforeach
                        <div class="my-4"><a href="#">Pokaż więcej</a></div>
                        <h3 class="widget-title">
                            <span class="border-bottom">Kwoty wynagrodzenia</span>
                        </h3>
                        @foreach ($offersCount as $offerCount)
                            <div class="row border-bottom pb-2 mb-3 hover:border-bottom-blue">
                                <div class="col-9">
                                    <label>
                                        <input type="radio" name="group1" value="Milk">
                                        {{ $offerCount->name }}
                                    </label><br/>
                                </div>
                                <div class="col">
                                    <span class="float-end pl-1">{{ $offerCount->count }}</span>
                                </div>
                            </div>
                        @endforeach
                        <div class="my-4"><a href="#">Pokaż więcej</a></div>
                        <h3 class="widget-title">
                            <span class="border-bottom">Lokacja</span>
                        </h3>
                        @foreach ($offersCount as $offerCount)
                            <div class="row border-bottom pb-2 mb-3 hover:border-bottom-blue">
                                <div class="col-9">
                                    <label>
                                        <input type="radio" name="group1" value="Milk">
                                        {{ $offerCount->name }}
                                    </label><br/>
                                </div>
                                <div class="col">
                                    <span class="float-end pl-1">{{ $offerCount->count }}</span>
                                </div>
                            </div>
                        @endforeach
                        <div class="my-4"><a href="#">Pokaż więcej</a></div>
                        <h3 class="widget-title">
                            <span class="border-bottom">Typy</span>
                        </h3>
                        @foreach ($offersCount as $offerCount)
                            <div class="row border-bottom pb-2 mb-3 hover:border-bottom-blue">
                                <div class="col-9">
                                    <label>
                                        <input type="radio" name="group1" value="Milk">
                                        {{ $offerCount->name }}
                                    </label><br/>
                                </div>
                                <div class="col">
                                    <span class="float-end pl-1">{{ $offerCount->count }}</span>
                                </div>
                            </div>
                        @endforeach
                        <div class="my-4"><a href="#">Pokaż więcej</a></div>
                    </div>
                </div>
                <!-- Middle panel -->
                <div class="col-6">
                    <div class="bg-white">
                        @foreach ($offers as $offer)
                            <a class="fs-5" href="/oferty/{{ $offer->slug }}">{{ $offer->title }}</a> 
                        @endforeach
                    </div>
                </div>
                <!-- Right panel -->
                <div class="col-3">
                    <div class = "widget-offer">
                        <h3 class="widget-title">
                            <span class="border-bottom">Ostatni pracodawcy</span>
                        </h3>   
                        <h3 class="widget-title">
                            <span class="border-bottom">Statystyki</span>
                        </h3>
                        <h3 class="widget-title">
                            <span class="border-bottom">Ostatnie prace</span>
                        </h3>
                        <ul>
                            @foreach ($offers as $offer)
                                <li>
                                    <a class="fw-bold text-dark" href="/oferty/{{ $offer->slug }}">{{ $offer->title }}</a><br>
                                    opublikowano w <a class="text-success" href="/category/{{ $offer->industryTable->id }}">{{ $offer->industryTable->name }}</a> 
                                </li>                   
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection