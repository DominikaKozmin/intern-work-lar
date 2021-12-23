@extends('layouts.template')

@section('content')
    <section>
        <div class="bgimage"
            style=" linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)); background-image: url({{ URL::asset('img/pracodawca.jpg') }});">
            <div class="dark">
                <div class="container">
                    <h1>Strefa pracodawcy</h1>
                    <div class="row justify-content-center">
                        <div class="col-4 text-center">
                            <a href="/login" class="button">Logowanie</a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="/register-employer" class="button">Rejestracja</a>
                        </div>
                        <h2 class="slider">Przeszukaj naszą bazę pracowników i znajdź kogoś dla swojej firmy!</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @php
        foreach ($packets as $packet) {
            $_ = $packet->color_scheme;
        }
    @endphp
    <div class="container">
      <h3 class="pTitle text-center">Zarejestruj się, wybierz i kup pakiet aby otrzymać pełny dostęp...</h3>
      <div class="text">... do profili zawodowych Pracowników z Ukrainy!</div>
      <div class="">
        @foreach ($packets as $packet)
            @php
                $test = $packet->renewals
            @endphp
            
            @include('components.packet',[
                'data' => '{{ $packet }}',
                'buisness_size' => '{!! dd($packet->buinsess_size) !!}',
                'packet_name' => '{{ $packet->packet_name }}',
                'price' => '{{ $test }}',
                'highlighted_offers' => '{{  $packet->highlighted_offers  }}',
                'renewals' => '{{ $test }}',
                'days' => '{{ $packet->days }}',
                'categories' => '{{ $packet->categories }}',
                'offers' => '{{ $packet->offers }}',
                'primary_color' => '{{ $packet->color_scheme->primary_color }}',
                'secondary_color' => '{{ $packet->color_scheme->secondary_color }}'
            ])
        @endforeach
      </div>
    </div>
    @include('components.candidate_profile_packages')
@endsection
