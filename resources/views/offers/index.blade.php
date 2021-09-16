@extends('template')

@section('content')
    <div class="container"> 
        <h1 class = "standard">Oferty pracy</h1>
        <aside class = "widget-offer">
            <h3 class="widget-title">
                <span>Branża</span>
            </h3>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="blankRadio" id="blankRadio1" value="option1">
                <label class="form-check-label" for="gridRadios1">IT - Rozwój oprogramowania
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="blankRadio" id="blankRadio1" value="option1">
                <label class="form-check-label" for="gridRadios1">Transport/Spedycja
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="blankRadio" id="blankRadio1" value="option1">
                <label class="form-check-label" for="gridRadios1">Praca fizyczna
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="blankRadio" id="blankRadio1" value="option1">
                <label class="form-check-label" for="gridRadios1">Produkcja
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="blankRadio" id="blankRadio1" value="option1">
                <label class="form-check-label" for="gridRadios1">IT - Administracja
                </label>
            </div>
        </aside>
        </div>
    </div>
@endsection