<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sidi extends Model
{
    protected $table = 'gr_sidi';

    protected $guarded = [];

    public $timestamps = true;

    public function jemaat()
    {
        return $this->belongsTo(Jemaat::class, 'id_jemaat_sidi');
    }
}
