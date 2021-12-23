<div class="album py-4 px-1 d-inline-block" style="width:33%;">
    <div class="card shadow">
        <img width="100%" height="225" class="" src="{{ asset('storage/accommodations_images/'. $accommodation->photo[0]->path) }}">
        <div class="card-body">
            <p class="fs-5 fw-bolder"><a class="text-dark" href="zakwaterowanie/{{ $accommodation->slug }}">{{ $accommodation->title }}</a></p>
            <div class="row">
                <div class="col">
                    <p>Lokacja: {{ $accommodation->city->name }}</p>
                    <p>Liczba pokoji: {{ $accommodation->rooms }}</p>
                </div>
                <div class="col">
                    <p>Metry kwadratowe: {{ $accommodation->square_meters }}</p>
                    <p>Cena: {{ $accommodation->price }}zł</p>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    @if (Auth::check())
                        <form class="d-inline-block float-end" action="/zakwaterowanie/{{ $accommodation->slug }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">Usuń</button>
                        </form>
                        <a class="btn btn-info float-end" href="/zakwaterowanie/{{ $accommodation->slug }}/edit/">Edytuj</a>
                    @endif
                </div>
                <div class="text-primary fw-bold"><a href="zakwaterowanie/{{ $accommodation->slug }}">Czytaj dalej <img src="{{ asset('img/icons/right-arrow.png') }}" alt=""></a></div>
            </div>
        </div>
    </div>
</div>
