<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';
    protected $fillable = ['nama', 'jabatan', 'wilayah', 'laporan', 'alamat', 'hp', 'status_laporan', 'keterangan_laporan'];
}
