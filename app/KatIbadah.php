<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KatIbadah extends Model
{
    protected $table = 'gr_kategori_ibadah';

    protected $guarded = [];

    public $timestamps = true;

    public function ibadah()
    {
        return $this->hasMany(Ibadah::class);
    }
}
