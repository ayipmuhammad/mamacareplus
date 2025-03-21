<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'username' => 'nullable|string|max:255',
            'name' => 'nullable|string|max:255',
            'ttl' => 'nullable|date',
            'gol_darah' => 'nullable|string|max:3',
            'email' => 'nullable|email|unique:users,email,' . $id,
            'no_telp' => 'nullable|string|max:15',
            'nik' => 'nullable|string|max:16',
            'alamat' => 'nullable|string|max:255',
            'old_password' => 'nullable|string', // Validasi password lama
            'password' => 'nullable|string|min:3|confirmed', // Password baru dan konfirmasi
        ]);

        // Temukan pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Jika password ingin diubah
        if ($request->filled('password')) {
            if (!Hash::check($request->input('old_password'), $user->password)) {
                return redirect()->back()->withErrors(['old_password' => 'Password lama tidak cocok!']);
            }
        
            // Perbarui password
            $user->password = Hash::make($request->input('password')); // Hashing manual
            $user->save(); // Pastikan perubahan tersimpan
        
            // Refresh sesi agar tetap login setelah perubahan password
            auth()->login($user);
        }
        // Perbarui data lainnya
        $user->update($validatedData);

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
        
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
