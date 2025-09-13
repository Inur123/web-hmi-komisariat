<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $fillable = ['nama_periode'];

    public function kaders()
    {
        return $this->hasMany(Kader::class);
    }
}
