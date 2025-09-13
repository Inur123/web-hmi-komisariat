<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kader extends Model
{
    protected $fillable = [
        'nama', 'jenis_kelamin', 'nohp', 'alamat',
        'fakultas', 'prodi', 'hobi', 'foto', 'periode_id', 'jabatan'
    ];

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}
