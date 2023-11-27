@extends('admin.header')
<link rel="stylesheet" href="{{ asset('/css/admin/obrisi_proizvod.css') }}">
@section('sadrzaj')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            <button id="closeBtn">OK</button>
        </div>
  
        <script>
            document.getElementById('closeBtn').addEventListener('click', function() {
                var alertBox = document.querySelector('.alert');
                alertBox.style.display = 'none';
            });
        </script>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Naziv</th>
                <th>Cena</th>
                <th>Pakovanje</th>
                <th>Raspoloživo</th>
                <th>Akcija</th>
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
                    <form method="POST" action="{{ route('obrisi-proizvod', ['id' => $proizvod->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="obrisi">Obriši</button>
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
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.alert {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #d6e9c6;
    border-radius: 4px;
    color: #3c763d;
    background-color: #dff0d8;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

.obrisi {
    cursor: pointer;
    background-color: #d9534f;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 3px;
}

.obrisi:hover {
    background-color: #c9302c;
}
</style>