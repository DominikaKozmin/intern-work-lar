@extends('template')

@section('content')

<div>
    <div class="w-full flex justify-center">
        <div class="w-3/5 h-60 flex justify-left items-center">
            <div>
                <div class="">
                    <div class="pb-5 text-sm"><a href="..">Start </a><span class="font-black">></span><a href="../artykuly"> Artykuły</a></div>
                    <div class="text-4xl">{{ $article->title }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="w-full flex justify-center">
        <div class="w-3/5 grid grid-cols-3">
            <div class="pr-4 col-span-2">
                <div> 
                    <div class="pb-10">
                        <img class="rounded-t-lg" src="{{ asset( 'storage/articles_images/'.$article->image ) }}">
                        <div class="px-8 pt-7 mb-1.5 bg-white h-auto">
                            <div class="inline-block italic text-gray-500 text-sm mb-3"><img class="inline-block pr-1" src="{{ asset('storage/folder.png') }}"
                                    alt=""><a class="inline-block pr-1" href="#"><span class="pr-2">Artykuły</span></a><img class="inline-block pr-1"
                                    src="{{ asset('storage/calendar.png') }}" alt="">{{ $article->created_at->ago() }}</div>
                            <div class="font-semibold leading-normal text-2xl pb-7">{{ $article->title }}</div>
                            <div class="text-sm leading-loose pb-5 text-gray-500">{{ $article->content }}</div>
                            <div class="py-10 grid grid-cols-2 border-t">
                                <div class="uppercase">Przez: {{ $article->user->name }}</div>
                                <div class="uppercase text-right">Udostępnij</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ml-4">
                <div class="bg-white flex">
                     @include('components.latest_articles_vertical') !-->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection