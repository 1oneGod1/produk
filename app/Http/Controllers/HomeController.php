<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman beranda.
     */
    public function index()
    {
        // Mengembalikan view untuk halaman beranda
        return view('home');
    }
}
