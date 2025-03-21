<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'nik',
        'ttl',
        'gol_darah',
        'alamat',
        'email',
        'password',
        'role',
        'no_telp'
    ];

    protected $casts = [
        'ttl' => 'date', // Pastikan kolom ttl diperlakukan sebagai tanggal
        'password' => 'hashed',
    ];
    
    protected $logoutOnPasswordReset = false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relationship with JadwalCheckup
     */
    public function jadwalCheckup()
    {
        return $this->hasMany(JadwalCheckup::class);
    }

    /**
     * Relationship with JadwalImunisasi
     */
    public function jadwalImunisasi()
    {
        return $this->hasMany(JadwalImunisasi::class);
    }
}
