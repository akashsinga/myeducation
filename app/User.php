<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use TaylorNetwork\UsernameGenerator\GeneratesUsernames;
use TaylorNetwork\UsernameGenerator\FindSimilarUsernames;
use TaylorNetwork\UsernameGenerator\Generator;

class User extends Authenticatable
{
    use Notifiable,FindSimilarUsernames,GeneratesUsernames;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name','father_name','department','mobile', 'email', 'password','address','type'
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
}
