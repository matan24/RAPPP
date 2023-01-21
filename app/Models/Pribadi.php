<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pribadi extends Model
{
    protected $table = 'data_pribadi';
    protected $fillable = [
        'nama', 
        'tempat',
        'tanggal', 
        'gender', 
        'status_pribadi', 
        'image', 
        'jabatan', 
        'wilayah',
        'alamat',
        'hp'
    ];
}
