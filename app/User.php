<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

//untuk mendefinisikan bahwa menggunakan method auth (login bawaan Laravel)
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use SoftDeletes;
 
 
    protected $fillable = [
        'username','name', 'email', 'password','ttl', 'nrp','pegawai','bagian_majelis','no_telp'
    ];
    // protected $dates = ['deleted_at'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
