<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = 'pindah_kerja';
    protected $fillable = [
        'nama', 'divisi_kerja', 'pindah_divisi', 'alasan_pindah', 'surat', 'alamat', 'berkas', 'keterangan_pindah'
    ];
}
