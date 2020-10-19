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
}
