@extends("layouts.main")
<link rel="stylesheet" href="{{ asset('/css/proizvod.css') }}">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@section("sadrzaj")

<div class="opis">
<h1 class="animate__animated animate__backInLeft">Ko smo mi? </h1>
<p class="opis">Mi smo mali proizvođači čija se porodica tradicionalno oko 150 godina bavi vodeničarskim zanatom, odnosno mlevenjem integralnog brašna na vodenici potočari.</p>   
<h1 class="animate__animated animate__backInLeft">Šta nudimo?</h1>
<p class="opis"> Nudimo integralna brašna i u ponudi imamo: kukuruzno, heljdino, ražano, ječmeno i pšenično (naše proizvode možete pogledati na stranici <b><a href="{{ route('proizvod') }}">ovde</a></b>)</p>
</div>

<div class="galerija">
    <div class="slike">
        <img src="images/novine.jpg" alt="Slika 1">
        <img src="images/jaz.jpg" alt="Slika 2">
        <img src="images/zutikukuruz.jpg" alt="Slika 3">
        <img src="images/sajam.jpg" alt="Slika 3">
    </div>
    <button class="strelica levo">&#8249;</button>
    <button class="strelica desno">&#8250;</button>
</div>
<div class="opis">
    <h1 class="animate__animated animate__backInLeft">Gde se nalazimo?</h1>
<p class="opis">Nalazimo se u selu Tulare kod Prokuplja, a lokaciju vodenice možete pogledati i ovde: </p>
</div>

<div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=vodenica tulare&amp;t=k&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://connectionsgame.org/">Connections Unlimited</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:400px;}.gmap_iframe {height:400px!important;}</style></div>

@php
    $proizvod = App\Models\Proizvod::all(); 
@endphp

@endsection
<style>

body{
    background-color:#f9f9f9; 
}

h1{
    text-align: center;
    background-color: #f9f9f9;
    margin: 0 !important;
    padding-top: 55px;
}

div .opis{
    text-align: center;
    background-color:#f9f9f9; 
    margin: 0 !important;
    padding-top:30px; 
    padding-bottom: 30px;
}

.galerija {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    overflow: hidden;
    position: relative;
    background-image: url('images/pozadina.avif'); 
    background-size: cover;
}

.slike {
    text-align: center;
}

.slike img {
    max-width: 900px;
    max-height: 800px;
    width: auto;
    height: auto;
    display: none;
    border-radius: 10px; 
}

.slike img.active {
    display: block;
}

.strelica {
    font-size: 44px;
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
            $(".slike img").fadeOut(500); 
            $(".slike img").eq(trenutnaSlika).fadeIn(500); 
        }
    });
    </script>