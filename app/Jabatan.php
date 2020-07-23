<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'gr_jabatan';

    protected $guarded = [];

    public function jemaat()
    {
        return $this->hasMany(Jemaat::class);
    }
    
}
