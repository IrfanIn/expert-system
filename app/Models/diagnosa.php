<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diagnosa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function penyakit()
    {
        return $this->belongsTo(penyakit::class);
    }

    public function gejala()
    {
        return $this->belongsTo(gejala::class);
    }
}
