@extends("layouts.main")
<link rel="stylesheet" href="{{ asset('css/kontakt.css') }}">
@section("sadrzaj")

<form action="{{ route('sendEmail') }}" method="POST">
  @csrf
  <label for="ime">Ime:</label>
  @if (Auth::check())
      <input type="text" id="ime" name="ime" required value="{{ Auth::user()->name }}">
  @else
      <input type="text" id="ime" name="ime" required>
  @endif
  
  <label for="email">Email adresa:</label>
  @if (Auth::check())
      <input type="email" id="email" name="email" required value="{{ Auth::user()->email }}">
  @else
      <input type="email" id="email" name="email" required>
  @endif
    <label for="predmet">Predmet:</label>
    <input type="text" id="predmet" name="predmet" required>
    <label for="poruka">Poruka:</label>
    <textarea id="poruka" name="poruka" required></textarea>
    <input type="submit" value="Pošalji">
  </form>

  @if(Session::has('success'))
  <div class="alert alert-success">
      {{ Session::get('success') }}
  </div>
@endif

@if(Session::has('error'))
  <div class="alert alert-danger">
      {{ Session::get('error') }}
  </div>
@endif


@endsection

