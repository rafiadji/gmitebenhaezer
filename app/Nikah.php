<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nikah extends Model
{
    protected $table = 'gr_nikah';

    protected $guarded = [];

    public function pria()
    {
        return $this->belongsTo(Jemaat::class, 'id_jemaat_pria');
    }

    public function wanita()
    {
        return $this->belongsTo(Jemaat::class, 'id_jemaat_wanita');
    }

    public function pendeta()
    {
        return $this->belongsTo(Jemaat::class, 'id_jemaat_pendeta');
    }
}
