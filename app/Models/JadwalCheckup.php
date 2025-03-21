<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalCheckup extends Model
{
    use HasFactory;

    protected $table = 'jadwal_checkup'; // Nama tabel
    protected $fillable = [
        'user_id',
        'nama',
        'alamat',
        'tanggal',
        'waktu',
        'lokasi',
        'status',
    ];

    // Relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
