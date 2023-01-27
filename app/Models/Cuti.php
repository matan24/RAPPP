<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $table = 'cuti_karyawan';
    protected $fillable = ['nama', 'divisi_kerja', 'wilayah_kerja', 'surat_cuti', 'hp', 'keterangan_cuti'];
}
