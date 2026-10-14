<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'judul' => 'Laskar Pelangi',
                'penulis' => 'Andrea Hirata',
                'tahun_terbit' => 2005,
                'stok' => 10,
            ],
            [
                'judul' => 'Bumi',
                'penulis' => 'Tere Liye',
                'tahun_terbit' => 2014,
                'stok' => 8,
            ],
            [
                'judul' => 'Dilan 1990',
                'penulis' => 'Pidi Baiq',
                'tahun_terbit' => 2014,
                'stok' => 12,
            ],
            [
                'judul' => 'Komet Minor',
                'penulis' => 'Tere Liye',
                'tahun_terbit' => 2019,
                'stok' => 5,
            ],
            [
                'judul' => 'Perahu Kertas',
                'penulis' => 'Dee Lestari',
                'tahun_terbit' => 2009,
                'stok' => 7,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
