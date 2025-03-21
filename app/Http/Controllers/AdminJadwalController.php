<?php

namespace App\Http\Controllers;

use App\Models\JadwalCheckup;
use App\Models\User;
use Illuminate\Http\Request;

class AdminJadwalController extends Controller
{
    // Menampilkan semua jadwal check-up untuk admin
    public function index()
{
    $jadwalCheckup = JadwalCheckup::with('user')->get(); // Ambil jadwal dengan relasi user

    \Log::info('Jadwal Checkup:', $jadwalCheckup->toArray()); // Log hasil query

    $users = User::all(); // Data pengguna untuk dropdown
    return view('admin.jadwal.index', compact('jadwalCheckup', 'users'));
}



    // Mengupdate status jadwal
    public function update(Request $request, $id)
    {
        $jadwal = JadwalCheckup::findOrFail($id);

        $request->validate([
            'status' => 'required|in:menunggu,terkonfirmasi,selesai',
        ]);

        $jadwal->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.jadwal.index')->with('success', 'Status jadwal berhasil diperbarui!');
    }

    // Menampilkan semua pengguna untuk dikelola admin
    public function manageUsers()
    {
        $users = User::all(); // Mengambil semua data pengguna
        return view('admin.users.index', compact('users'));
    }

    // Menambahkan pengguna baru
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|in:user,admin',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil ditambahkan!');
    }

    public function store(Request $request)
{
    // Debugging: Log data yang diterima
    \Log::info('Request Data:', $request->all());

    // Validasi input
    $validated = $request->validate([
        'user_id' => 'required|exists:users,id',
        'alamat' => 'required|string',
        'tanggal' => 'required|date',
        'waktu' => 'required|date_format:H:i', // Validasi format waktu yang benar
        'lokasi' => 'required|string',
        'status' => 'required|string|in:menunggu,terkonfirmasi,selesai',
    ]);

    // Ambil data user berdasarkan user_id yang dipilih
    $user = User::findOrFail($request->user_id);

    // Log user yang dipilih
    \Log::info('User Data:', $user->toArray());

    // Simpan data jadwal checkup
    JadwalCheckup::create([
        'user_id' => $user->id,
        'nama' => $user->name,  // Nama diambil dari tabel user
        'alamat' => $user->alamat,  // Alamat yang diinputkan di form
        'tanggal' => $request->tanggal,
        'waktu' => $request->waktu,
        'lokasi' => $request->lokasi,
        'status' => $request->status,
    ]);

    // Log hasil penyimpanan
    \Log::info('Jadwal Checkup Created:', [
        'user_id' => $user->id,
        'nama' => $user->name,
        'alamat' => $request->alamat,
        'tanggal' => $request->tanggal,
        'waktu' => $request->waktu,
        'lokasi' => $request->lokasi,
        'status' => $request->status,
    ]);

    return redirect()->route('admin.jadwal.index')->with('success', 'Data jadwal berhasil ditambahkan!');
}







    public function destroy($id)
    {
        $jadwal = JadwalCheckup::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal check-up berhasil dihapus!');
    }

    public function create()
{
    // Ambil semua user untuk dropdown
    $users = User::all();

    // Ambil data user berdasarkan user_id yang dipilih (jika ada)
    $selectedUser = null;

    if (request()->has('user_id')) {
        $selectedUser = User::find(request('user_id'));
    }

    return view('admin.jadwal.create', compact('users', 'selectedUser'));
}

}
