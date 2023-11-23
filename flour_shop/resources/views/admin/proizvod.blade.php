@extends('admin.header')
<link rel="stylesheet" href="{{ asset('/css/admin/proizvod.css') }}">
@section('sadrzaj')
    
<a href="{{ url('/dodaj_proizvod') }}" class="dodaj">Dodaj proizvod</a>
<a href="{{ url('/obrisi_proizvod') }}" class="obrisi">Obrisi proizvod</a>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Naziv</th>
            <th>Cena</th>
            <th>Pakovanje</th>
            <th>Raspoloživo</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($proizvodi as $proizvod)
            <tr>
                <td>{{ $proizvod->id }}</td>
                <td>{{ $proizvod->naziv }}</td>
                <td>{{ $proizvod->cena }}</td>
                <td>{{ $proizvod->pakovanje }}</td>
                <td>{{ $proizvod->raspolozivo ? 'Da' : 'Ne' }}</td>
                <td>
                    <form method="GET" action="{{ route('izmeniProizvod', $proizvod->id) }}"> 
                        @csrf
                        <input type="hidden" name="id" value="{{ $proizvod->id }}">
                        <button type="submit" class="izmeni">Izmeni</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.header {
    background-color: #333;
    color: #fff;
    padding: 10px;
    text-align: center;
}

.dodaj{
    display: inline-block;
    padding: 10px;
    margin: 10px;
    text-decoration: none;
    color: #fff;
    background-color: #2420f3;
    border-radius: 5px;
}

.obrisi {
    display: inline-block;
    padding: 10px;
    margin: 10px;
    text-decoration: none;
    color: #fff;
    background-color: #db3434;
    border-radius: 5px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #3498db;
    color: #fff;
}

tbody tr:hover {
    background-color: #f5f5f5;
}

.izmeni {
    background-color: #2ecc71;
    color: #fff;
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
}

</style>
