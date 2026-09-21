<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahBuku = 5;
        $jumlahMember = 3;
        $jumlahKategori = 4;

        return view('dashboard.index', compact(
            'jumlahBuku',
            'jumlahMember',
            'jumlahKategori'
        ));
    }
}