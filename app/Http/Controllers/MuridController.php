<?php
// app/Http/Controllers/MuridController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\Berita;
use App\Models\Ekskul;
use Carbon\Carbon;

class MuridController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $ekskulId = session('selected_ekskul_id');

        // Statistics
        $totalHadir = Presensi::where('user_id', $user->id)
            ->where('ekskul_id', $ekskulId)
            ->where('status', 'hadir')
            ->count();

        $totalTidakHadir = Presensi::where('user_id', $user->id)
            ->where('ekskul_id', $ekskulId)
            ->where('status', 'tidak_hadir')
            ->count();

        $totalIzin = Presensi::where('user_id', $user->id)
            ->where('ekskul_id', $ekskulId)
            ->where('status', 'izin')
            ->count();

        $selectedEkskul = Ekskul::find($ekskulId);

        return view('murid.dashboard', compact('totalHadir', 'totalTidakHadir', 'totalIzin', 'selectedEkskul'));
    }

    public function presensi()
    {
        $user = auth()->user();
        $ekskulId = session('selected_ekskul_id');
        $selectedEkskul = Ekskul::find($ekskulId);

        // Check if already present today
        $todayPresensi = Presensi::where('user_id', $user->id)
            ->where('ekskul_id', $ekskulId)
            ->whereDate('tanggal', today())
            ->first();

        $recentPresensis = Presensi::where('user_id', $user->id)
            ->where('ekskul_id', $ekskulId)
            ->with('ekskul')
            ->latest()
            ->limit(10)
            ->get();

        return view('murid.presensi', compact('selectedEkskul', 'todayPresensi', 'recentPresensis'));
    }

    public function storePresensi(Request $request)
    {
        $user = auth()->user();
        $ekskulId = session('selected_ekskul_id');

        $request->validate([
            'status' => 'required|in:hadir,tidak_hadir,izin',
            'keterangan' => 'nullable|string|max:255',
        ]);

        // Check if already present today
        $exists = Presensi::where('user_id', $user->id)
            ->where('ekskul_id', $ekskulId)
            ->whereDate('tanggal', today())
            ->exists();

        if ($exists) {
            return back()->with('error', 'Anda sudah melakukan presensi hari ini');
        }

        Presensi::create([
            'user_id' => $user->id,
            'ekskul_id' => $ekskulId,
            'tanggal' => today(),
            'jam' => now()->format('H:i:s'),
            'status' => $request->status,
            'keterangan' => $request->keterangan,
        ]);

        return back()->with('success', 'Presensi berhasil disimpan');
    }

    public function homepage()
    {
        $beritas = Berita::where('status', true)->latest()->limit(6)->get();
        return view('murid.homepage', compact('beritas'));
    }
}
