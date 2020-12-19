<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kader extends Model
{
    protected $table="kaders";
    
    protected $fillable = [
        'nama_kader',
        'alamat_kader',
        'telp_kader',
        'password',
        'posyandu_id',
    ];

    public function posyandu()
    {
        return $this->belongsTo(Posyandu::class);
    }
}

