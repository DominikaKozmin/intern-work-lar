@php
use Illuminate\Support\Str;
$articles = Illuminate\Support\Facades\DB::table('articles')
    ->orderByDesc('created_at')
    ->take(3)
    ->get();
@endphp
<div class="album py-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($articles as $article)
                <div class="col">
                    <div class="card shadow-sm">
                        <img width="100%" height="225" class="" src="{{ asset('storage/articles_images/' . $article->image) }}">
                        <div class="card-body">
                            <p class="fs-5 fw-bolder"><a class="text-dark" href="artykuly/{{ $article->slug }}">{{ $article->title }}</a></p>
                            <p class="card-text fw-light border-bottom pb-3 lh-lg fs-6">{{ Str::of(strip_tags($article->content))->words(15, '...') }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div></div>
                                <div class="text-primary fw-bold"><a href="artykuly/{{ $article->slug }}">Czytaj dalej <img src="{{ asset('storage/icons/right-arrow.png') }}" alt=""></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach 
        </div>
    </div>
</div>
