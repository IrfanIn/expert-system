<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penyakit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rule()
    {
        return $this->hasMany(rule::class);
    }

    public function gejala_detail()
    {
        return $this->hasMany(gejala_detail::class);
    }

    public function solusi()
    {
        return $this->hasMany(solusi::class);
    }

    public function diagnosa()
    {
        return $this->hasMany(diagnosa::class);
    }
}
