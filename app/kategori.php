<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    //
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    protected $fillable = [
        'nama_kategori',
        'ket_kategori',
        'status_kategori',
    ];
}
