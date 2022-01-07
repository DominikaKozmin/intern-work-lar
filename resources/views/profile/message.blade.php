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
                <a href="/profil/wiadomosci" class="list-group-item list-group-item-action">Wiadomości</a>
            </div>
        </div>
        <div class="col-8">
            <div class="bg-white overflow-hidden p-2">
                <h1 class="mb-3">{{ $message->item }}</h1>
                <span class="pb-5">{{ $message->content}}</span>
                <div class="border-top mt-3">
                    {{ $message->name }} <br>
                    <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>    <span class="float-end">{{ $message->created_at }}</span> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection