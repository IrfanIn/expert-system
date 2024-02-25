<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class analisa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function analisa_detail()
    {
        return $this->hasMany(analisa_detail::class);
    }
}
