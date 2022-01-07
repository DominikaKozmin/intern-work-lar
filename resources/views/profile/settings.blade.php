@extends('layouts.template')
@section('content')

<div class="container pt-5">
    <div class="row">
        <div class="col-4">
            <div class="list-group">
                <a href="/profil" class="list-group-item list-group-item-action" aria-current="true">
                Profil
                </a>
                <a href="#" class="list-group-item list-group-item-action active">Ustawienia</a>
                <a href="/profil/wiadomosci" class="list-group-item list-group-item-action">Wiadomości</a>
            </div>
        </div>
        <div class="col-8">
            <label for="avatar">Zmiana avataru</label>
            <form class="border" name="avatar" action="changeavatar" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="avatar" id=""><br>
                <input type="submit" value="Wyślij">
            </form>
            <label for="changepassword">Zmień hasło</label>
            <form class="border overflow-hidden" name="changepassword" action="changepassword" method="POST">
                @csrf
                <label for="old_password">Stare hasło</label><br>
                <input type="password" name="old_password" value=""><br>
                <label for="password">Nowe hasło</label><br>
                <input type="password" name="password" value=""><br>
                <label for="password_confirmation">Powtórz hasło</label><br>
                <input type="password" name="password_confirmation" id=""><br>
                <input class="float-end" type="submit" value="Wyślij">
            </form>    
        </div>
    </div>
</div>



@endsection