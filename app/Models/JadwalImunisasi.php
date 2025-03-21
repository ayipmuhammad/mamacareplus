<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalImunisasi extends Model
{
    use HasFactory;

    protected $table = 'jadwal_imunisasi';

    protected $fillable = [
        'user_id',
        'nama_anak',
        'usia',
        'tanggal',
        'lokasi',
    'jenis_imunisasi',
        'catatan',
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}
    
}
