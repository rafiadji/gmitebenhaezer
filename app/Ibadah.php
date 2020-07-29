<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ibadah extends Model
{
    protected $table = 'gr_ibadah';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kategori()
    {
        return $this->belongsTo(KatIbadah::class, 'id_kategori');
    }
}
