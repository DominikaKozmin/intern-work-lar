<div class="p-9">
    <div class="uppercase  pb-3 text-sm font-semibold">Najnowsze artykuły</div>
    <div class="w-12 border-b mb-8"></div>

    @for ($i = 0; $i<count($articles) ; $i++)
        <div class="py-2 mb-5">
            <img class="h-20 w-20 inline-block"
                src="{{ asset('storage/articles_images/' . $articles[$i]->image) }}">
            <div class="inline-block">
                <div class="text-sm text-gray-400">{{ $articles[$i]->created_at }}</div>
                <div class="p-1 font-semibold text-gray-900 text-sm lending-6"><a
                        href="{{ $articles[$i]->slug }}">{{ $articles[$i]->title }}</a></div>
            </div>
        </div>
    @endfor
    <div class="uppercase  pb-3 text-sm font-semibold">Najnowsze komentarze</div>
    <div class="w-12 border-b mb-8"></div>
</div>
