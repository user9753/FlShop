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
                        <form method="POST" action="{{ route('obrisi-proizvod', $proizvod->id) }}">
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
