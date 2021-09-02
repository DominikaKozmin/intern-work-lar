@php
use Illuminate\Support\Str;
$posts = Illuminate\Support\Facades\DB::table('Posts')
    ->orderByDesc('created_at')
    ->take(3)
    ->get();
@endphp
@foreach ($posts as $post)
    <div class="px-4">
        <div>
            <img src="{{ asset('storage/articles_images/' . $post->lokacja_obrazu) }}">
            <div class="px-8 pt-7 mb-1.5 bg-white h-auto">
                <div class="font-semibold leading-relaxed">{{ $post->tytul }}</div>
                <div class="text-sm leading-relaxed pb-5">{{ Str::of($post->zawartosc)->words(15, ' ...') }}</div>
                <div class="py-10 flex flex-row-reverse border-t">
                    <img class="" src="{{ asset('storage/right-arrow.png') }}" alt="">
                    <a href="artykuly/{{ $post->slug }}" class=" font-semibold text-blue-500">Czytaj dalej
                        &nbsp;&nbsp; </a>
                </div>
            </div>
        </div>
    </div>
@endforeach
