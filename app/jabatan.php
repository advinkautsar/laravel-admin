<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    //
    protected $fillable = [
        'kode_jabatan',
        'nama_jabatan',
        'gaji',
        
    ];
}

