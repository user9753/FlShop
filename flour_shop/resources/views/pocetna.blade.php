@extends("layouts.main")
<link rel="stylesheet" href="{{ asset('/css/proizvod.css') }}">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@section("sadrzaj")

<div class="galerija">
    <div class="slike">
        <img src="images/novine.jpg" alt="Slika 1">
        <img src="images/heljda.jpg" alt="Slika 2">
        <img src="images/zutikukuruz.jpg" alt="Slika 3">
    </div>
    <button class="strelica levo">&#8249;</button>
    <button class="strelica desno">&#8250;</button>
</div>

<h1>Naši proizvodi:</h1>

@php
        $proizvod = App\Models\Proizvod::all(); 
    @endphp

{{-- @include('proizvod') --}}

{{-- @include('kontakt') --}}
@endsection

<style>
.galerija {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; 
    overflow: hidden;
    position: relative;
}

.slike {
    display: flex;
    text-align: center;
}

.slike img {
    width: 100%;
    height: auto;
    max-width: 600px; 
}

.strelica {
    font-size: 24px;
    background: none;
    border: none;
    cursor: pointer;
    position: absolute;
}

.strelica.levo {
    left: 10px;
}

.strelica.desno {
    right: 10px;
}

</style>

<script>
$(document).ready(function() {
    let trenutnaSlika = 0;
    const ukupnoSlika = $(".slike img").length;

    $(".slike img").hide(); 
    $(".slike img").eq(trenutnaSlika).show(); 
    $(".slike img").eq(trenutnaSlika).addClass("active"); 

    $(".strelica.desno").click(function() {
        trenutnaSlika++;
        if (trenutnaSlika >= ukupnoSlika) {
            trenutnaSlika = 0;
        }
        updateSlikeTransform();
    });

    $(".strelica.levo").click(function() {
        trenutnaSlika--;
        if (trenutnaSlika < 0) {
            trenutnaSlika = ukupnoSlika - 1;
        }
        updateSlikeTransform();
    });

    function updateSlikeTransform() {
        const sirinaSlike = $(".slike img").width();
        const novaTransformacija = -trenutnaSlika * sirinaSlike;
        $(".slike").css("transform", `translateX(${novaTransformacija}px)`);

        $(".slike img").removeClass("active"); 
        $(".slike img").eq(trenutnaSlika).addClass("active"); 
    }
});

</script>