<?php

namespace App\Http\Controllers;

class BookController extends Controller
{
    public function index()
    {
        $books = [
            [
                'judul' => 'Laskar Pelangi',
                'penulis' => 'Andrea Hirata',
                'tahun' => 2005
            ],
            [
                'judul' => 'Bumi',
                'penulis' => 'Tere Liye',
                'tahun' => 2014
            ],
            [
                'judul' => 'Dilan 1990',
                'penulis' => 'Pidi Baiq',
                'tahun' => 2014
            ],
            [
                'judul' => 'Komet Minor',
                'penulis' => 'Tere Liye',
                'tahun' => 2019
            ],
            [
                'judul' => 'Perahu Kertas',
                'penulis' => 'Dee Lestari',
                'tahun' => 2009
            ]
        ];

        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        return view('books.show', compact('id'));
    }
}