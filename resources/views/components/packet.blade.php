<div class="text-center d-inline-block mb-4" style="width: 33%">
    @php
    @endphp
    <div class="fs-4 p-3 text-light uppercase" style="background-color: #{{ $packet->color_scheme->primary_color }}">
        {{ $packet->packet_name }} Firma
    </div>
    @php
    @endphp
    <div class="fs-2 px-3 py-5 text-light lh-sm uppercase" style="background-color: #{{ $packet->color_scheme->secondary_color }}">
        Pakiet {{ $packet->packet_name }} 
        @php 
        if($packet->price!=0){
            echo $packet->price." zł";
        }
        else{
            echo "<br>&#8203";
        }
        @endphp
    </div>
    <div class="fs-5" style="background-color: #f5f5f5">
        <div class="p-3 border">
            <span class="text-primary">{{  $packet->highlighted_offers  }}</span> Wyróżniony ofert pracy
        </div>
        <div class="p-3 border">
            <span class="text-primary">{{ $packet->renewals }}</span> Odnowień ofert
        </div>
        <div class="p-3 border">
            <span class="text-primary">{{ $packet->days }}</span> dni
        </div>
        <div class="p-3 border">
            <span class="text-primary">{{ $packet->categories }}</span> Kategoria
        </div>
        <div class="p-3 border">
            <span class="text-primary">{{ $packet->offers }}</span> Oferta
        </div>
    </div>
    <div class="p-3" style="background-image: linear-gradient(to bottom,#ffffff,#e1e1e1)">
        <a href=""><div class="fs-5 text-light py-2" style="background-color: #{{ $packet->color_scheme->primary_color }}">Kup teraz</div></a>
    </div>
</div>