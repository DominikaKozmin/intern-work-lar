@extends('layouts.template')

@section('content')

<div class="container">
    <div class="standard"><a href="/">Start</a> > {{ $category->name }}
        <h1 class="">{{ $category->name }}</h1>
    </div> 
    @php
        $i=0;
        $newArray = [];
        foreach ($offers as $offer) {
            array_push($newArray, $offer);
            $newArray[sizeof($newArray)-1] += ['name' => $offersRightPanel[$i]->user->name];
            $i++;
        }
    @endphp
    <div id="app">
        <category-middle-panel id="{{ $id }}"></category-middle-panel>
    </div>
</div>

@endsection