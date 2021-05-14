<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetKeuangan extends Model
{
    protected $table = 'gr_set_keuangan';

    protected $guarded = [];

    public $timestamps = true;

    public function keuangan()
    {
        return $this->hasMany(Keuangan::class);
    }
}
