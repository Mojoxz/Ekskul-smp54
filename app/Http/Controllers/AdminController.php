<?php
// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ekskul;
use App\Models\Presensi;
use App\Models\Berita;
use App\Models\UserEkskul;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalMurid = User::where('role', 'murid')->count();
        $totalEkskul = Ekskul::count();
        $totalPresensiHariIni = Presensi::whereDate('tanggal', today())->count();
        $totalBerita = Berita::count();

        return view('admin.dashboard', compact('totalMurid', 'totalEkskul', 'totalPresensiHariIni', 'totalBerita'));
    }

    public function muridIndex()
    {
        $murids = User::where('role', 'murid')->with('ekskuls')->paginate(10);
        return view('admin.murid.index', compact('murids'));
    }

    public function muridCreate()
    {
        $ekskuls = Ekskul::where('status', true)->get();
        return view('admin.murid.create', compact('ekskuls'));
    }

    public function muridStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'kelas' => 'required|string|max:10',
            'password' => 'required|string|min:6',
            'ekskul_ids' => 'required|array',
            'ekskul_ids.*' => 'exists:ekskuls,id',
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'kelas' => $request->kelas,
                'password' => Hash::make($request->password),
                'role' => 'murid',
            ]);

            $user->ekskuls()->attach($request->ekskul_ids);
        });

        return redirect()->route('admin.murid.index')->with('success', 'Murid berhasil ditambahkan');
    }

    public function ekskulIndex()
    {
        $ekskuls = Ekskul::paginate(10);
        return view('admin.ekskul.index', compact('ekskuls'));
    }

    public function ekskulCreate()
    {
        return view('admin.ekskul.create');
    }

    public function ekskulStore(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
            'hari' => 'required|string',
        ]);

        Ekskul::create($request->all());

        return redirect()->route('admin.ekskul.index')->with('success', 'Ekstrakurikuler berhasil ditambahkan');
    }

    public function rekapPresensi(Request $request)
    {
        $ekskuls = Ekskul::all();
        $presensis = collect();

        if ($request->has(['tanggal_mulai', 'tanggal_selesai'])) {
            $query = Presensi::with(['user', 'ekskul'])
                ->whereBetween('tanggal', [$request->tanggal_mulai, $request->tanggal_selesai]);

            if ($request->ekskul_id) {
                $query->where('ekskul_id', $request->ekskul_id);
            }

            $presensis = $query->get();
        }

        return view('admin.rekap-presensi', compact('ekskuls', 'presensis'));
    }

    public function beritaIndex()
    {
        $beritas = Berita::with('user')->latest()->paginate(10);
        return view('admin.berita.index', compact('beritas'));
    }

    public function beritaCreate()
    {
        return view('admin.berita.create');
    }

    public function beritaStore(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan');
    }
}
