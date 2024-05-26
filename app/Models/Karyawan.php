<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nik',
        'nama',
        'ttl',
        'alamat',
        'id_jabatan',
        'id_dept',
    ];
}
