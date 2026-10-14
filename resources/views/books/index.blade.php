@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Buku</h2>

    <p>Berikut adalah daftar buku yang tersedia di perpustakaan.</p>

    <p>
        <a href="{{ route('books.create') }}">+ Tambah Buku</a>
    </p>

    @if(session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    @if($books->count() > 0)
        <table border="1" cellpadding="10" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->judul }}</td>
                        <td>{{ $book->penulis }}</td>
                        <td>{{ $book->tahun_terbit }}</td>
                        <td>{{ $book->stok }}</td>
                        <td>
                            <a href="{{ route('books.show', $book) }}">
                                Detail
                            </a>
                            |
                            <a href="{{ route('books.edit', $book) }}">
                                Edit
                            </a>
                            |
                            <form
                                action="{{ route('books.destroy', $book) }}"
                                method="POST"
                                style="display: inline;"
                                onsubmit="return confirm('Yakin ingin menghapus buku ini?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada buku di database.</p>
    @endif
</div>
@endsection