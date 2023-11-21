@extends("layouts.main")
<link rel="stylesheet" href="{{ asset('/css/onama.css') }}">
@section("sadrzaj")

<div class="onamaslike">
    <div class="container">
    <div class="slike"> 
            <div class="col">
            <img src="images/onama1.png" alt="">
            </div>
            <div class="col">
             <img src="images/onama2.png" alt="">
            </div>
            <div class="col">
             <img src="images/onama5.png" alt="">
            </div>
            {{-- <div class="col">
             <img src="images/onama3.png" alt="">
            </div> --}}
            {{-- <div class="col">
             <img src="images/onama4.png" alt="">
            </div>  --}}
        </div>
    </div>
</div>

<div class="opis_onama">
    <div class="container">
        <div class="row">    
<p>Vodenica je stara oko 150 godina i nakon dvadesetogodišnje pauze ponovo je obnovljena i aktivno melje. Nalazi se na Backoj reci i jedna je od retkih koja je danas aktivna i sačuvana.
</p>
<p>Dođite i posetite nas,bavimo se mlevenjem i prodajom integralnog brašna(kukurznog, heljdinog, ražanog, ječmenog i pšeničnog integralnog).
</p>
</div>
</div>
</div>


    <div class="maps">
    <div class="container">
        <div class="row">    

<div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=vodenica tulare&amp;t=k&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://connectionsgame.org/">Connections Unlimited</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:400px;}.gmap_iframe {height:400px!important;}</style></div>
</div>
</div>
</div>
@endsection

