@extends('layouts.template')

@section('content')

<div class="container">
    <div class="py-5">

    </div>
    <div>
        <span class="fs-1 py-5">Register</span>
    </div>
    <div class="d-flex justify-content-center">
        <div class="bg-white p-5" style="width: 66.6666%">
            <div>
                <div class="fs-3 text-center pt-5 pb-4">Rejestracja kandydata</div>
            </div> 
            <form method="POST" action="{{ url('/register-employee') }}">
                @csrf
                <div>
                    <div class="py-2">
                        <label>Nazwa użytkownika</label>
                        <input type="text" class="form-control" name='name' placeholder="Nazwa użytkownika">
                    </div>
                    <div class="py-2">
                        <label>Email</label>
                        <input type="text" class="form-control" name='email' placeholder="Email">
                    </div>
                    <div class="py-2">
                        <label>Hasło</label>
                        <input type="password" class="form-control" name='password' placeholder="Hasło">
                    </div>
                    <div class="py-2">
                        <label>Powtórz hasło</label>
                        <input type="password" class="form-control" name='password_confirmation' placeholder="Powtórz hasło">
                    </div>
                </div><br>
                <button type="submit" class="btn btn-primary" style="width: 100%;margin-left: 0;">Zarejestruj się</button>
            </form>
        </div>
    </div>
</div>
@endsection
