<?php

namespace App\Http\Controllers;

class MemberController extends Controller
{
    public function index()
    {
        $members = [
            'Teuku',
            'Ronald',
            'Adit'
        ];

        return view('members.index', compact('members'));
    }
}