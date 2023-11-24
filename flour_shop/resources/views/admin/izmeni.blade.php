
@extends("admin.header")
<link rel="stylesheet" href="{{ asset('/css/admin/izmeni_proizvod.css') }}">
@section("sadrzaj")
    <h3>Izmena podataka proizvoda</h3>
    <form action="{{ route('azuriraj-proizvod', $proizvod->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <p>Naziv: <input type="text" name="naziv" value="{{ $proizvod->naziv }}"></p>
        <p>Cena: <input type="text" name="cena" value="{{ $proizvod->cena }}"></p>
        <p>Pakovanje: <input type="text" name="pakovanje" value="{{ $proizvod->pakovanje }}"></p>
        <p>Opis: <textarea name="opis">{{ $proizvod->opis }}</textarea></p>
        <p>Slika: <input type="file" name="slika"></p>
        <p>Raspoloživo: <input type="checkbox" name="raspolozivo" {{ $proizvod->raspolozivo ? 'checked' : '' }}></p>
        <p><input type="submit" name="update" value="Izmeni"></p>
    </form>
@endsection

<style>

body {
    font-family: 'Arial', sans-serif;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
}

h3 {
    color: #333;
}

form {
    margin-top: 20px;
}

form p {
    margin-bottom: 15px;
}

form input,
form select,
form textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    box-sizing: border-box;
}

form input[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    cursor: pointer;
}

form input[type="submit"]:hover {
    background-color: #45a049;
}

form label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
}

form input:focus,
form select:focus,
form textarea:focus {
    background-color: #f0f8ff; 
}

form input[type="radio"],
form input[type="checkbox"] {
    margin-right: 5px;
}

.alert {
    padding: 15px;
    background-color: #f44336; 
    color: #fff;
    margin-bottom: 15px;
}

#closeBtn {
    cursor: pointer;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    padding: 5px 10px;
}

#closeBtn:hover {
    background-color: #45a049;
}

</style>