<div class="">
    <div class="uppercase pb-3"><div class="w-1/2 border-bottom">Najnowsze artykuły</div></div>
    <!-- <div class="w-12 border-b mb-8 border-bottom"></div> !-->

    @for ($i = 0; $i<count($articles) ; $i++)
        <div class="py-2 mb-3 row">
            <img class="col-3" height="85px" width="85px"
                src="{{ asset('storage/articles_images/' . $articles[$i]->image) }}">
            <div class="col pr-24">
                <div class="text-sm text-gray-400">{{ $articles[$i]->created_at }}</div>
                <div class=""><a class="text-break text-dark font-bold"
                        href="{{ $articles[$i]->slug }}">{{ $articles[$i]->title }}</a></div>
            </div>
        </div>
    @endfor
    <div class="uppercase pb-3 text-sm font-semibold"><div class="w-1/2 border-bottom">Najnowsze komentarze</div></div>
    <div class="w-12 border-b mb-8"></div>
</div>