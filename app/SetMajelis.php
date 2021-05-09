<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetMajelis extends Model
{
    protected $table = 'front_majelis';

    protected $guarded = [];

    public function jemmat()
    {
        return $this->belongsTo(Jemaat::class, 'id_jemaat_majelis');
    }
}
