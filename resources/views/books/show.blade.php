@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Buku</h2>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <td>{{ $book->id }}</td>
        </tr>
        <tr>
            <th>Judul</th>
            <td>{{ $book->judul }}</td>
        </tr>
        <tr>
            <th>Penulis</th>
            <td>{{ $book->penulis }}</td>
        </tr>
        <tr>
            <th>Tahun Terbit</th>
            <td>{{ $book->tahun_terbit }}</td>
        </tr>
        <tr>
            <th>Stok</th>
            <td>{{ $book->stok }}</td>
        </tr>
    </table>

    <p>
        <a href="{{ route('books.index') }}">Kembali ke Daftar Buku</a>
        |
        <a href="{{ route('books.edit', $book) }}">Edit Buku</a>
    </p>
</div>
@endsection