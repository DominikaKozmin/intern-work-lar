@extends('layouts.template')

@section('content')

<div class="container">
    <div class="standard"><a href="/">Start</a> > {{ $category->name }}
        <h1 class="">{{ $category->name }}</h1>
    </div> 
    <div class="bg-white w-full p-4 mb-5">
        Placeholder
    </div>
    <div class="bg-white px-5 py-4">
        <div>
            <div class="d-inline-block align-top float-start pr-2">
                <img class="float-left" src="{{ URL::asset('img/images/user64.png') }}" alt="">
            </div>
            <div class="d-inline-block w-auto overflow-hidden">
                <div class="fs-5">Tytuł</div>
                <div><img class="pr-1" src="{{ URL::asset('img/icons/location.png') }}" alt="">Lokacja</div>
                <div><img class="pr-1" src="{{ URL::asset('img/icons/briefcase.png') }}" alt="">Użytkownik</div>
                <div><img class="pr-1" src="{{ URL::asset('img/icons/salary.png') }}" alt="">Wynagrodzenie</div>
                <div><img class="pr-1" src="{{ URL::asset('img/icons/calendar.png') }}" alt=""> Data wystawienia</div>
            </div>
            <div class="d-inline-block align-top float-right float-end">
                <div class="float-end bg-danger text-white rounded-pill px-2 py-1">Kontrakt</div>
                <img src="{{ URL::asset('img/icons/heart.png') }}" alt="">               
            </div>
        </div>
        
        
    </div>

</div>

@endsection