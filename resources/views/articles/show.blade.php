@extends('layouts.template')

@section('content')
    <!-- {{ Date::setLocale('pl') }} -->
    <div class="container">
        <div class="mt-5 mb-5">
            <div>
                <div class="pb-3"><a href="..">Start </a><span class="font-black">></span><a href="../artykuly"> Artykuły</a> > {{ $article->title }}</div>
                <div class="fs-1">{{ $article->title }}</div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="pb-5 bg-white rounded-b">
                    <img class="rounded-t w-100" src="{{ asset('storage/articles_images/' . $article->image) }}">
                    <div class="p-4 h-auto">
                        <div class="d-inline-block text-secondary pb-3">
                            <img class="d-inline-block pr-1" src="{{ asset('img/icons/folder.png') }}" alt="">
                            <a class="text-secondary pr-3" href="#">Artykuły</a>
                            <img class="d-inline-block pr-1" src="{{ asset('img/icons/calendar.png') }}" alt="">
                            {{ $article->created_at->ago() }}
                        </div>
                        <div class="pb-3 text-dark fs-2">{{ $article->title }}</div>
                        <div class="pb-3 mb-3 text-secondary border-bottom">{!! $article->content !!}</div>
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
    </div>

@endsection
