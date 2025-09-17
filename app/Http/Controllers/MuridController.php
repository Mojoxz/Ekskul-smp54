<?php
// app/Http/Controllers/MuridController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\Berita;
use App\Models\Ekskul;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

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


        public function profile()
    {
        $user = auth()->user();
        return view('murid.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_photo')) {
            // Hapus foto lama jika ada
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            // Simpan foto baru
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->update(['profile_photo' => $path]);
        }

        return redirect()->route('murid.profile')->with('success', 'Foto profil berhasil diperbarui!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'confirmed', Password::min(6)],
        ], [
            'current_password.required' => 'Password lama harus diisi.',
            'password.required' => 'Password baru harus diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'password.min' => 'Password minimal 6 karakter.',
        ]);

        $user = auth()->user();

        // Verifikasi password lama
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('murid.profile')
                ->withErrors(['current_password' => 'Password lama tidak sesuai.']);
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('murid.profile')->with('success', 'Password berhasil diperbarui!');
    }

    // ... other existing methods ...
}




