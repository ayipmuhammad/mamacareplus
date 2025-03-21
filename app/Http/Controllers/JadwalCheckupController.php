<?php

namespace App\Http\Controllers;

use App\Models\JadwalCheckup;
use Illuminate\Http\Request;

class JadwalCheckupController extends Controller
{
    // Menampilkan semua data jadwal
    public function index(Request $request)
{
    // Ambil semua tanggal pembuatan unik untuk pengguna yang login
    $dates = JadwalCheckup::where('user_id', auth()->id())
                          ->selectRaw('DATE(created_at) as created_date')
                          ->distinct()
                          ->orderBy('created_date', 'desc')
                          ->get();

    // Filter data berdasarkan pengguna yang login
    $jadwalCheckup = JadwalCheckup::where('user_id', auth()->id())
                                  ->when($request->date, function ($query, $date) {
                                      return $query->whereDate('created_at', $date);
                                  })
                                  ->get();

    return view('jadwal.index', compact('dates', 'jadwalCheckup'));
}






    // Menampilkan form tambah data
    public function create()
    {
        return view('jadwal.create');
    }

    // Menyimpan data baru ke database
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'alamat' => 'required',
        'tanggal' => 'required|date',
        'waktu' => 'required',
        'lokasi' => 'required',
    ]);

    JadwalCheckup::create([
        'user_id' => auth()->id(), // ID pengguna yang sedang login
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'tanggal' => $request->tanggal,
        'waktu' => $request->waktu,
        'lokasi' => $request->lokasi,
        'status' => 'menunggu', // Default status "Menunggu"
    ]);

    return redirect()->route('jadwal.index')->with('success', 'Data berhasil ditambahkan!');
}


    public function user()
{
    return $this->belongsTo(User::class);
}
public function destroy($id)
{
    $jadwal = JadwalCheckup::findOrFail($id); // Cari data berdasarkan ID
    $jadwal->delete(); // Hapus data

    return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus!');
}

}
