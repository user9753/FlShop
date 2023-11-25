@extends("admin.header")
<link rel="stylesheet" href="{{ asset('/css/admin/obrisi_proizvod.css') }}">
@section("sadrzaj")
    <h3>Da li ste sigurni da želite da obrišete proizvod?</h3>
    <form action="{{ route('obrisi-proizvod', $proizvod->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Da, obriši</button>
        <a href="{{ route('admin.proizvod.index') }}">Otkaži</a>
    </form>
@endsection