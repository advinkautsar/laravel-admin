<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posyandu extends Model
{
    protected $table="posyandus";
    
    protected $fillable = [
        'nama_posyandu',
        'alamat_posyandu',
    ];

    public function kaders()
    {
        return $this->hasMany(Kader::class);
    }
}
