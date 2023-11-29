@extends("layouts.main")
<link rel="stylesheet" href="{{ asset('/css/proizvod.css') }}">
@section("sadrzaj")
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
  @if(isset($proizvod))
  <section class="featured">
    <div class="containers">
      <div class="row">
  @foreach ($proizvod as $brasno)
  <div class="col">
  <div class="featured-item">
   <h3>{{ $brasno->naziv }}</h3>
   <img src="{{ asset('images/' . $brasno->slika) }}" alt="{{ $brasno->naziv }}">
   <p>Cena: <b>{{ $brasno->cena }}</b> <sup>RSD</sup> / po KG </p>
   <div>
    <a href="{{ route('naruci.show', ['id' => $brasno->id]) }}">
      <button class="dugme"><b>Poruči</b></button></a>
   </div>
 </div>
</div>
@endforeach
</div>
</div>
</section>
@else 
<h1>Ne postoji</h1>
@endif
@endsection

