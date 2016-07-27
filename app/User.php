<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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

    public static function findByEmail($email)
    {
        return self::where('email', $email)->firstOrFail();
    }

    public function carts()
    {
        return $this->hasMany('App\CartDetail');
    }

    public function lists()
    {
        return $this->hasMany('App\UserList');
    }
}
