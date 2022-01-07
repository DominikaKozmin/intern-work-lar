@extends('layouts.template')
@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-4">
                <div class="list-group">
                    <a href="/profil" class="list-group-item list-group-item-action" aria-current="true">
                    Profil
                    </a>
                    <a href="/profil/ustawienia" class="list-group-item list-group-item-action">Ustawienia</a>
                    <a href="#" class="list-group-item list-group-item-action active">Wiadomości</a>
                </div>
            </div>
            <div class="col-8">
                @foreach ($messages as $message)
                    <a href="/profil/wiadomosc/{{ $message->id }}">
                        <div class="bg-white fs-4 p-2">
                            {{ $message->item }} wysłano przez {{ $message->name }} <span class="float-end">{{ $message->created_at }}</span> 
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection