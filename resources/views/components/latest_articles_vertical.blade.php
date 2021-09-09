<div class="p-4 bg-white mr-5">
    <div class="uppercase pb-3"><div class="w-1/2 border-bottom">Najnowsze artykuły</div></div>
    @for ($i = 0; $i<count($articles) ; $i++)
        <div class="py-4 mb-3">
            <a class="float-left pr-3" href="{{ $articles[$i]->slug }}"><img class="float-left" height="85px" width="85px"
                src="{{ Thumbnail::src('/public/articles_images/'. $articles[$i]->image, 'local')->crop(85, 85)->url() }}"></a> 
            <div class="">
                <div class="text-sm text-gray-400">{{ $articles[$i]->created_at }}</div>
                <div class=""><a class="text-break text-dark font-bold"
                        href="{{ $articles[$i]->slug }}">{{ $articles[$i]->title }}</a></div>
            </div>
        </div>
    @endfor

    <div class="uppercase pb-3 text-sm font-semibold"><div class="w-1/2 border-bottom">Najnowsze komentarze</div></div>
    <div class="w-12 border-b mb-8"></div>
</div>