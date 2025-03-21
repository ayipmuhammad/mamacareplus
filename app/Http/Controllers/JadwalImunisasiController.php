<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\JadwalImunisasi;

class JadwalImunisasiController extends Controller
{
    public function index()
{
    $jadwal = JadwalImunisasi::where('user_id', Auth::id())->get();
    return view('jadwal-imunisasi.index', compact('jadwal'));
}


    public function create()
    {
        return view('jadwal-imunisasi.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_anak' => 'required|string|max:255',
        'usia' => 'required|integer|min:0',
        'tanggal' => 'required|date',
        'lokasi' => 'required|string|max:255',
        'jenis_imunisasi' => 'required|string|max:255',
        'catatan' => 'nullable|string',
    ]);

    JadwalImunisasi::create([
        'user_id' => Auth::id(), // Pastikan user_id diisi dengan ID pengguna yang sedang login
        'nama_anak' => $request->nama_anak,
        'usia' => $request->usia,
        'tanggal' => $request->tanggal,
        'lokasi' => $request->lokasi,
        'jenis_imunisasi' => $request->jenis_imunisasi,
        'catatan' => $request->catatan,
    ]);

    return redirect()->route('jadwal-imunisasi.index')->with('success', 'Jadwal imunisasi berhasil dibuat.');
}

}
