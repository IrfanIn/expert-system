<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class siswa extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $guarded = ['id'];

    // relasi dengan tabel kelas
    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }

    // relasi dengan tabel spp
    public function spp()
    {
        return $this->belongsTo(spp::class);
    }
}
