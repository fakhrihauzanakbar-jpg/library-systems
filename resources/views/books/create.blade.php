@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Buku</h2>

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <p>
            <label>Judul Buku</label><br>
            <input
                type="text"
                name="judul"
                value="{{ old('judul') }}"
                required
            >
        </p>

        <p>
            <label>Penulis</label><br>
            <input
                type="text"
                name="penulis"
                value="{{ old('penulis') }}"
                required
            >
        </p>

        <p>
            <label>Tahun Terbit</label><br>
            <input
                type="number"
                name="tahun_terbit"
                min="1000"
                max="{{ date('Y') }}"
                value="{{ old('tahun_terbit') }}"
                required
            >
        </p>

        <p>
            <label>Stok</label><br>
            <input
                type="number"
                name="stok"
                min="0"
                value="{{ old('stok', 0) }}"
                required
            >
        </p>

        <button type="submit">Simpan Buku</button>
        <a href="{{ route('books.index') }}">Batal</a>
    </form>
</div>
@endsection