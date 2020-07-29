<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $table = 'gr_keuangan';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function setting()
    {
        return $this->belongsTo(SetKeuangan::class, 'id_set');
    }
}
