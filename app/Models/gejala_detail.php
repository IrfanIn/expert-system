<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gejala_detail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function gejala()
    {
        return $this->belongsTo(gejala::class);
    }

    public function penyakit()
    {
        return $this->belongsTo(penyakit::class);
    }
}
