<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->get();

        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255|different:penulis',
            'penulis' => 'required|string|max:255|different:judul',
            'tahun_terbit' => [
                'required',
                'integer',
                'min:1900',
                'max:' . date('Y'),
            ],
            'stok' => 'required|integer|min:0|max:10000',
            'category_id' => 'required|exists:categories,id',
        ], [
            'judul.required' => 'Judul buku wajib diisi.',
            'judul.different' => 'Judul tidak boleh sama dengan nama penulis.',
            'penulis.required' => 'Nama penulis wajib diisi.',
            'penulis.different' => 'Nama penulis tidak boleh sama dengan judul.',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.integer' => 'Tahun terbit harus bilangan bulat.',
            'tahun_terbit.min' => 'Tahun terbit minimal 1900.',
            'tahun_terbit.max' => 'Tahun terbit tidak boleh melebihi tahun sekarang.',
            'stok.required' => 'Stok buku wajib diisi.',
            'stok.integer' => 'Stok harus berupa bilangan bulat.',
            'stok.min' => 'Stok tidak boleh negatif.',
            'stok.max' => 'Stok maksimal 10000.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists' => 'Kategori yang dipilih tidak tersedia.',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show(Book $book)
    {
        $book->load('category');

        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $categories = Category::orderBy('name')->get();

        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255|different:penulis',
            'penulis' => 'required|string|max:255|different:judul',
            'tahun_terbit' => [
                'required',
                'integer',
                'min:1900',
                'max:' . date('Y'),
            ],
            'stok' => 'required|integer|min:0|max:10000',
            'category_id' => 'required|exists:categories,id',
        ], [
            'judul.required' => 'Judul buku wajib diisi.',
            'judul.different' => 'Judul tidak boleh sama dengan nama penulis.',
            'penulis.required' => 'Nama penulis wajib diisi.',
            'penulis.different' => 'Nama penulis tidak boleh sama dengan judul.',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.integer' => 'Tahun terbit harus bilangan bulat.',
            'tahun_terbit.min' => 'Tahun terbit minimal 1900.',
            'tahun_terbit.max' => 'Tahun terbit tidak boleh melebihi tahun sekarang.',
            'stok.required' => 'Stok buku wajib diisi.',
            'stok.integer' => 'Stok harus berupa bilangan bulat.',
            'stok.min' => 'Stok tidak boleh negatif.',
            'stok.max' => 'Stok maksimal 10000.',
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists' => 'Kategori yang dipilih tidak tersedia.',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}