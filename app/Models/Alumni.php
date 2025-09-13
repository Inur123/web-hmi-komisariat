<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $table = 'alumnis';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'alamat',
        'nohp',
        'foto',
        'fakultas',
        'prodi',
        'periode',
        'jabatan'
    ];
}
