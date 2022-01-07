@extends('layouts.template')
@section('content')
<div class="container pt-5">
    <div class="row">
        <div class="col-4">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                Profil
                </a>
                <a href="/profil/ustawienia" class="list-group-item list-group-item-action">Ustawienia</a>
                <a href="/profil/wiadomosci" class="list-group-item list-group-item-action">Wiadomości</a>
            </div>
        </div>
        <div class="col-8 bg-white p-3">
            <span class="fs-1">{{ $user['name'] }}</span> 
            <img class="float-end" src="{{ $user->showAvatar() }}" alt="">
            @if (count($user->offers)>0)
                <h3>Oferty pracy:</h3>
                @foreach ($user->offers as $offer)
                    <a href="/oferty/{{ $offer->slug }}">{{ $offer->title }}</a><br>
                @endforeach
            @endif
            @if (count($user->articles))
                <h2>Artykuły</h2> 
                @foreach ($user->articles as $article)
                <a href="/artykuly/{{ $article->slug }}">{{ $article->title }}</a><br>
                @endforeach
            @endif
            @if (count($user->accommodations))
                <h2>Zakwaterowania</h2>
                @foreach ($user->accommodations as $accommodation)
                    <a href="/artykuly/{{ $accommodation->slug }}">{{ $accommodation->title }}</a><br>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection