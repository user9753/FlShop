@extends('admin.header')
{{-- <link rel="stylesheet" href="{{ asset('/css/admin/dodaj_proizvod.css') }}"> --}}
@section('sadrzaj')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
        <button id="closeBtn">OK</button>
    </div>
@endif

<h3>Dodaj novi proizvod</h3>

<form action="{{ route('sacuvaj-proizvod') }}" method="post" enctype="multipart/form-data">
    @csrf

    <label for="naziv">Naziv:</label>
    <input type="text" name="naziv" id="naziv" required>

    <label for="cena">Cena:</label>
    <input type="text" name="cena" id="cena" required>

    <label>Pakovanje:</label>
    <div class="pakovanje-options">
        <div>
            <input type="checkbox" name="pakovanje[]" value="1" id="pakovanje_1">
            <label for="pakovanje_1">1</label>
        </div>
        <div>
            <input type="checkbox" name="pakovanje[]" value="5" id="pakovanje_5">
            <label for="pakovanje_5">5</label>
        </div>
        <div>
            <input type="checkbox" name="pakovanje[]" value="25" id="pakovanje_25">
            <label for="pakovanje_25">25</label>
        </div>
    </div>

    <label for="opis">Opis:</label>
    <textarea name="opis" id="opis">{{ old('opis') }}</textarea>

    <label for="slika">Slika:</label>
    <input type="file" name="slika" id="slika">

    <label for="raspolozivo">Raspoloživo:</label>
    <input type="checkbox" name="raspolozivo" id="raspolozivo" checked>

    <button type="submit">Dodaj proizvod</button>
</form>




@endsection

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
}

h3 {
    color: #007bff;
    text-align: center;
}

form {
    max-width: 400px; 
    margin: 0 auto; 
}

label {
    display: block; 
    margin-bottom: 8px; 
    text-align: center;
}

input, select, textarea {
    width: 100%; 
    padding: 8px; 
    margin-bottom: 16px; 
}

button {
    background-color: #4CAF50; 
    color: white; 
    padding: 10px 15px; 
    border: none; 
    border-radius: 4px; 
    cursor: pointer;
    text-align: center;
}

button:hover {
    background-color: #45a049;
}

.pakovanje-options {
    display: flex;
}

.pakovanje-options div {
    margin-right: 20px; 
}

</style>
