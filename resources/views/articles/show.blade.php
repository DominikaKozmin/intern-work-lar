@extends('template')

@section('content')
    <!-- {{ Date::setLocale('pl') }} !-->
    <div class="container">
        <div class="mt-5 mb-5">
            <div>
                <div class="pb-3"><a href="..">Start </a><span class="font-black">></span><a href="../artykuly"> Artykuły</a> {{ $article->title }}</div>
                <div class="fs-1">{{ $article->title }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="pb-5">
                    <img class="rounded w-100" src="{{ asset('storage/articles_images/' . $article->image) }}">
                    <div class="p-4 h-auto">
                        <div class="d-inline-block text-secondary pb-3"><img class="d-inline-block pr-1"
                                src="{{ asset('storage/icons/folder.png') }}" alt=""><a class="text-secondary"
                                href="#"><span class="pr-3">Artykuły</span></a><img
                                class="d-inline-block pr-1" src="{{ asset('storage/icons/calendar.png') }}"
                                alt="">{{ $article->created_at->ago() }}</div>
                        <div class="pb-3"><a class="text-dark fs-2"
                                href="artykuly/{{ $article->slug }}">{{ $article->title }}</a></div>
                        <div class="pb-5 text-secondary">{!! $article->content !!}</div>
                        <div class="row">
                            <div class="col uppercase">Przez: <b>{{ $article->user->name }}</b></div>
                            <div class="col uppercase text-end">Udostępnij</div>
                        </div>
                    </div>
                </div>
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
