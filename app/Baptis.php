<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baptis extends Model
{
    protected $table = 'gr_baptis';

    protected $guarded = [];

    public $timestamps = true;

    public function calon()
    {
        return $this->belongsTo(Jemaat::class, 'id_jemaat_baptis');
    }

    public function ayah()
    {
        return $this->belongsTo(Jemaat::class, 'id_jemaat_ayah');
    }

    public function ibu()
    {
        return $this->belongsTo(Jemaat::class, 'id_jemaat_ibu');
    }

    public function pendeta()
    {
        return $this->belongsTo(Jemaat::class, 'id_jemaat_pendeta');
    }
}
