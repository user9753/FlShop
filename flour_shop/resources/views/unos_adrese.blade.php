@extends("layouts.main")
<link rel="stylesheet" href="{{ asset('/css/unos_adrese.css') }}">
@section("sadrzaj")
    <h1>Detalji za dostavu</h1>

    <form method="post" action="{{ route('sacuvajAdresu') }}">
        @csrf

        <label for="name">Ime:</label>
        <input type="text" name="name" id="name" required value="{{ Auth::user()->name }}">
        
        <label for="surname">Prezime:</label>
        <input type="text" name="surname" id="surname" required value="{{ Auth::user()->surname }}">
        
        <label for="email">Email adresa:</label>
        <input type="email" name="email" id="email" required value="{{ Auth::user()->email }}">
        
        <label for="phone_numb">Broj telefona:</label>
        <input type="tel" name="phone_numb" id="phone_numb" required value="{{ Auth::user()->phone_numb }}">        
       
       @php
        $adresa = \App\Models\Adresa::where('id', Auth::user()->id)->first();
       @endphp
        
        @if ($adresa)
            <label for="grad">Grad:</label>
            <input type="text" name="grad" id="grad" required value="{{ $adresa->grad }}">
        
            <label for="ulica">Ulica:</label>
            <input type="text" name="ulica" id="ulica" required value="{{ $adresa->ulica }}">
        
            <label for="broj">Broj:</label>
            <input type="text" name="broj" id="broj" required value="{{ $adresa->broj }}">
        
            <label for="postanski_broj">Poštanski broj:</label>
            <input type="text" name="postanski_broj" id="postanski_broj" required value="{{ $adresa->postanski_broj }}">
            @else
            <label for="grad">Grad:</label>
            <input type="text" name="grad" id="grad" required>
    
            <label for="ulica">Ulica:</label>
            <input type="text" name="ulica" id="ulica" required>
    
            <label for="broj">Broj:</label>
            <input type="text" name="broj" id="broj" required>
    
            <label for="postanski_broj">Poštanski broj:</label>
            <input type="text" name="postanski_broj" id="postanski_broj" required>
        @endif
    


        <button type="submit">Nastavi</button>
    </form>
@endsection
