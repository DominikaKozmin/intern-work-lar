@extends('layouts.template')

@section('content')
    <!-- {{ Date::setLocale('pl') }} -->
    <div class="container">
        <div class="mt-5 mb-5">
            <div>
                <div class="pb-3"><a href="..">Start </a><span class="font-black">></span> Artykuły</div>
                <div class="fs-1">Artykuły</div>
                @if (session()->has('message'))
                    <p class='alert alert-info mt-4'>
                        {{ session()->get('message') }}
                    </p>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                @foreach ($articles as $article)
                    <div class="mb-5 bg-white">
                        <img class="rounded-t w-100" src="{{ asset('storage/articles_images/' . $article->image) }}">
                        <div class="p-4 h-auto rounded-b">
                            <div class="d-inline-block text-secondary pb-3 w-full">
                                <img class="d-inline-block pr-1" src="{{ asset('img/icons/folder.png') }}" alt="">
                                <a class="text-secondary pr-3" href="#"> Artykuły</a>
                                <img class="d-inline-block pr-1" src="{{ asset('img/icons/calendar.png') }}" alt="">
                                {{ $article->created_at->ago() }}
                                @if (Auth::check())
                                    <form class="d-inline-block float-end" action="/artykuly/{{ $article->slug }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">Usuń</button>
                                    </form>
                                    <a class="btn btn-info float-end" href="/artykuly/{{ $article->slug }}/edit/">Edytuj</a>
                                @endif
                            </div>
                            <div class="pb-3">
                                <a class="text-dark fs-2" href="/artykuly/{{ $article->slug }}">{{ $article->title }}</a>
                            </div>
                            <div class="pb-3 mb-3 text-secondary border-bottom">
                                {{ Str::of(strip_tags($article->content))->words(55, ' [...]') }}</div>
                            <div class="row">
                                <div class="col uppercase">Przez: <b>{{ $article->user->name }}</b></div>
                                <div class="col uppercase text-end">Udostępnij</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-4">
                @include('components.latest_articles_vertical')
            </div>
        </div>
        @if (Auth::check())
            <a href="/artykuly/create">Utwórz nowy artykuł</a>
        @endif
    </div>

@endsection
