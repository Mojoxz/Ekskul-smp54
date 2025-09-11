<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Ekskul;

class HomeController extends Controller
{
    public function index()
    {
        $beritas = Berita::where('status', true)
                        ->with('user')
                        ->latest()
                        ->take(6)
                        ->get();
        
        $ekskuls = Ekskul::where('status', true)
                        ->take(8)
                        ->get();

        return view('welcome', compact('beritas', 'ekskuls'));
    }

    public function tentang()
    {
        return view('pages.tentang');
    }

    public function berita()
    {
        $beritas = Berita::where('status', true)
                        ->with('user')
                        ->latest()
                        ->paginate(9);

        return view('pages.berita', compact('beritas'));
    }

    public function beritaDetail($id)
    {
        $berita = Berita::where('status', true)
                       ->with('user')
                       ->findOrFail($id);

        $beritaLainnya = Berita::where('status', true)
                              ->where('id', '!=', $id)
                              ->latest()
                              ->take(3)
                              ->get();

        return view('pages.berita-detail', compact('berita', 'beritaLainnya'));
    }

    public function ekstrakurikuler()
    {
        $ekskuls = Ekskul::where('status', true)->get();
        return view('pages.ekstrakurikuler', compact('ekskuls'));
    }

    public function kontak()
    {
        return view('pages.kontak');
    }
}