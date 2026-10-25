@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Buku</h2>

    @if($errors->any())
        <div style="color: red;">
            <strong>Periksa kembali data yang dimasukkan:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <div>
            <label for="judul">Judul Buku</label><br>
            <input id="judul" type="text" name="judul"
                   value="{{ old('judul') }}" required>
            @error('judul')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="penulis">Nama Penulis</label><br>
            <input id="penulis" type="text" name="penulis"
                   value="{{ old('penulis') }}" required>
            @error('penulis')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="tahun_terbit">Tahun Terbit</label><br>
            <input id="tahun_terbit" type="number" name="tahun_terbit"
                   value="{{ old('tahun_terbit') }}" required>
            @error('tahun_terbit')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="stok">Stok Buku</label><br>
            <input id="stok" type="number" name="stok"
                   value="{{ old('stok') }}" required>
            @error('stok')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="category_id">Kategori</label><br>
            <select name="category_id" id="category_id" required>
                <option value="">Pilih kategori</option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        @selected(old('category_id') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <p style="color:red">{{ $message }}</p>
            @enderror
        </div>

        <br>
        <button type="submit">Simpan Buku</button>
        <a href="{{ route('books.index') }}">Batal</a>
    </form>
</div>
@endsection