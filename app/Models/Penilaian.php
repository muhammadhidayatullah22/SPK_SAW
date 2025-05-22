<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penilaian extends Model
{
    use HasFactory;
    protected $fillable = ['siswa_id', 'kriteria_id', 'nilai'];

    public function siswa() {
        return $this->belongsTo(Siswa::class);
    }

    public function kriteria() {
        return $this->belongsTo(Kriteria::class);
    }
}

