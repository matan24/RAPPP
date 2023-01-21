<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    protected $table = 'izin_kerja';
    protected $fillable = ['nama', 'divisi_kerja', 'surat_sakit', 'alamat', 'hp', 'keterangan_sakit'];
}
