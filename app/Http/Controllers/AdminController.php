<?php
// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ekskul;
use App\Models\Presensi;
use App\Models\Berita;
use App\Models\UserEkskul;
use App\Models\Setting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PresensiExport;

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

    // ============ MURID MANAGEMENT ============
    public function muridIndex(Request $request)
    {
        $query = User::where('role', 'murid')->with('ekskuls');
        
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('kelas', 'LIKE', "%{$search}%");
            });
        }

        $murids = $query->paginate(10);
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

    public function muridEdit($id)
    {
        $murid = User::where('role', 'murid')->with('ekskuls')->findOrFail($id);
        $ekskuls = Ekskul::where('status', true)->get();
        return view('admin.murid.edit', compact('murid', 'ekskuls'));
    }

    public function muridUpdate(Request $request, $id)
    {
        $murid = User::where('role', 'murid')->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'kelas' => 'required|string|max:10',
            'password' => 'nullable|string|min:6',
            'ekskul_ids' => 'required|array',
            'ekskul_ids.*' => 'exists:ekskuls,id',
        ]);

        DB::transaction(function () use ($request, $murid) {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'kelas' => $request->kelas,
            ];

            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }

            $murid->update($data);
            $murid->ekskuls()->sync($request->ekskul_ids);
        });

        return redirect()->route('admin.murid.index')->with('success', 'Data murid berhasil diupdate');
    }

    public function muridDestroy($id)
    {
        $murid = User::where('role', 'murid')->findOrFail($id);
        $murid->ekskuls()->detach();
        $murid->delete();

        return redirect()->route('admin.murid.index')->with('success', 'Murid berhasil dihapus');
    }

    // ============ EKSKUL MANAGEMENT ============
    public function ekskulIndex(Request $request)
    {
        $query = Ekskul::query();
        
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('nama', 'LIKE', "%{$search}%");
        }

        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        $ekskuls = $query->paginate(10);
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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
            'hari' => 'required|string',
            'kategori' => 'required|string',
            'kapasitas' => 'required|integer|min:1',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('ekskul', 'public');
        }

        Ekskul::create($data);

        return redirect()->route('admin.ekskul.index')->with('success', 'Ekstrakurikuler berhasil ditambahkan');
    }

    public function ekskulEdit($id)
    {
        $ekskul = Ekskul::findOrFail($id);
        return view('admin.ekskul.edit', compact('ekskul'));
    }

    public function ekskulUpdate(Request $request, $id)
    {
        $ekskul = Ekskul::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
            'hari' => 'required|string',
            'kategori' => 'required|string',
            'kapasitas' => 'required|integer|min:1',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($ekskul->gambar) {
                Storage::disk('public')->delete($ekskul->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('ekskul', 'public');
        }

        $ekskul->update($data);

        return redirect()->route('admin.ekskul.index')->with('success', 'Ekstrakurikuler berhasil diupdate');
    }

    public function ekskulDestroy($id)
    {
        $ekskul = Ekskul::findOrFail($id);
        
        // Hapus gambar jika ada
        if ($ekskul->gambar) {
            Storage::disk('public')->delete($ekskul->gambar);
        }

        // Hapus relasi dengan user
        $ekskul->users()->detach();
        $ekskul->delete();

        return redirect()->route('admin.ekskul.index')->with('success', 'Ekstrakurikuler berhasil dihapus');
    }

    // ============ BERITA MANAGEMENT ============
    public function beritaIndex(Request $request)
    {
        $query = Berita::with('user')->latest();
        
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('judul', 'LIKE', "%{$search}%");
        }

        $beritas = $query->paginate(10);
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

    public function beritaEdit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function beritaUpdate(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($berita->foto) {
                Storage::disk('public')->delete($berita->foto);
            }
            $data['foto'] = $request->file('foto')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diupdate');
    }

    public function beritaDestroy($id)
    {
        $berita = Berita::findOrFail($id);
        
        // Hapus foto jika ada
        if ($berita->foto) {
            Storage::disk('public')->delete($berita->foto);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus');
    }

    // ============ REKAP PRESENSI ============
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

    public function exportPresensi(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);

        return Excel::download(new PresensiExport($request->tanggal_mulai, $request->tanggal_selesai, $request->ekskul_id), 'rekap-presensi.xlsx');
    }

    // ============ SETTINGS MANAGEMENT ============
    public function settings()
    {
        $settings = Setting::all()->groupBy('group');
        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            if ($key !== '_token' && $key !== '_method') {
                $setting = Setting::where('key', $key)->first();
                if ($setting) {
                    if ($setting->type === 'file' && $request->hasFile($key)) {
                        // Hapus file lama jika ada
                        if ($setting->value && Storage::disk('public')->exists($setting->value)) {
                            Storage::disk('public')->delete($setting->value);
                        }
                        $value = $request->file($key)->store('settings', 'public');
                    }
                    $setting->update(['value' => $value]);
                }
            }
        }

        return redirect()->route('admin.settings')->with('success', 'Pengaturan berhasil disimpan');
    }

    // ============ BULK ACTIONS ============
    public function bulkDeleteMurid(Request $request)
    {
        $ids = $request->input('ids', []);
        if (!empty($ids)) {
            User::whereIn('id', $ids)->where('role', 'murid')->delete();
            return response()->json(['success' => true, 'message' => count($ids) . ' murid berhasil dihapus']);
        }
        return response()->json(['success' => false, 'message' => 'Tidak ada data yang dipilih']);
    }

    public function bulkDeleteEkskul(Request $request)
    {
        $ids = $request->input('ids', []);
        if (!empty($ids)) {
            $ekskuls = Ekskul::whereIn('id', $ids)->get();
            foreach ($ekskuls as $ekskul) {
                if ($ekskul->gambar) {
                    Storage::disk('public')->delete($ekskul->gambar);
                }
                $ekskul->users()->detach();
            }
            Ekskul::whereIn('id', $ids)->delete();
            return response()->json(['success' => true, 'message' => count($ids) . ' ekstrakurikuler berhasil dihapus']);
        }
        return response()->json(['success' => false, 'message' => 'Tidak ada data yang dipilih']);
    }
}