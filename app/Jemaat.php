<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
    protected $table = 'gr_jemaat';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, "id_jabatan");
    }

    public function baptis()
    {
        return $this->hasMany(Baptis::class);
    }

    public function sidi()
    {
        return $this->hasOne(Sidi::class);
    }

    public function nikah()
    {
        return $this->hasMany(Nikah::class);
    }

}
