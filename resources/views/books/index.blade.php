@extends('layouts.app')

@section('content')

    <h2>Daftar Buku</h2>

    @if(count($books) > 0)

        <ul>
            @foreach($books as $book)
                <li>
                    <strong>{{ $book['judul'] }}</strong><br>
                    Penulis: {{ $book['penulis'] }}<br>
                    Tahun Terbit: {{ $book['tahun'] }}<br>
                    <a href="/books/{{ $loop->iteration }}">Lihat Detail</a>
                </li>

                <br>
            @endforeach
        </ul>

    @else

        <p>Belum ada buku.</p>

    @endif

@endsection