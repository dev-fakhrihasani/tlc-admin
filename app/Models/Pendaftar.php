<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $fiillable = [
        'nama', 'email', 'tempat_lahir', 'tanggal_lahir', 'no_hp', 'jenjang_pendidikan', 'asal_sekolah', 'kelas', 'peminatan', 'alasan_join', 'ss1', 'ss2', 'ss3', 'ss4'
    ];
}
