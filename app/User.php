<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function jemaat()
    {
        return $this->hasOne(Jemaat::class, 'id_user');
    }

    public function pengumuman()
    {
        return $this->hasMany(Pengumuman::class, 'id_user');
    }

    public function ibadah()
    {
        return $this->hasMany(Ibadah::class, 'id_user');
    }

    public function keuangan()
    {
        return $this->hasMany(Keuangan::class, 'id_user');
    }
}
