@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Buku</h2>

    <p>Silakan isi data buku dengan benar.</p>

    @if($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <strong>Data belum valid. Periksa kembali:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="judul">Judul Buku</label><br>
            <input
                id="judul"
                type="text"
                name="judul"
                value="{{ old('judul') }}"
                maxlength="255"
                required
            >

            @error('judul')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="penulis">Nama Penulis</label><br>
            <input
                id="penulis"
                type="text"
                name="penulis"
                value="{{ old('penulis') }}"
                maxlength="255"
                required
            >

            @error('penulis')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="tahun_terbit">Tahun Terbit</label><br>
            <input
                id="tahun_terbit"
                type="number"
                name="tahun_terbit"
                value="{{ old('tahun_terbit') }}"
                required
            >

            @error('tahun_terbit')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="stok">Stok Buku</label><br>
            <input
                id="stok"
                type="number"
                name="stok"
                value="{{ old('stok') }}"
                required
            >

            @error('stok')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Simpan Buku</button>
        <a href="{{ route('books.index') }}">Batal</a>
    </form>
</div>
@endsection