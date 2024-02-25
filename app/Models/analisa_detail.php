<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class analisa_detail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function analisa()
    {
        return $this->belongsTo(analisa::class);
    }

    public function penyakit()
    {
        return $this->belongsTo(penyakit::class);
    }
}
