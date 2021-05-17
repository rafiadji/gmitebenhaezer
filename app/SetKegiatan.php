<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetKegiatan extends Model
{
    protected $table = 'front_kegiatan';

    protected $guarded = [];

    public $timestamps = true;
}
