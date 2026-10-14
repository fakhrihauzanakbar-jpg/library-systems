<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // READ: menampilkan daftar buku
    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
    }

    // CREATE: menampilkan form tambah buku
    public function create()
    {
        return view('books.create');
    }

    // STORE: menyimpan buku baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1000|max:' . date('Y'),
            'stok' => 'required|integer|min:0',
        ]);

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    // READ: menampilkan detail buku
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // UPDATE: menampilkan form edit
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // UPDATE: menyimpan perubahan buku
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1000|max:' . date('Y'),
            'stok' => 'required|integer|min:0',
        ]);

        $book->update($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }

    // DELETE: menghapus buku
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}