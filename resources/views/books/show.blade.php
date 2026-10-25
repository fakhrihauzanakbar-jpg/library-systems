@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Buku</h2>

    <p><strong>ID:</strong> {{ $book->id }}</p>
    <p><strong>Judul:</strong> {{ $book->judul }}</p>
    <p><strong>Penulis:</strong> {{ $book->penulis }}</p>
    <p><strong>Tahun Terbit:</strong> {{ $book->tahun_terbit }}</p>
    <p><strong>Stok:</strong> {{ $book->stok }}</p>
    <p>
        <strong>Kategori:</strong>
        {{ $book->category?->name ?? 'Belum ada kategori' }}
    </p>

    <a href="{{ route('books.index') }}">Kembali ke Daftar Buku</a>
</div>
@endsection