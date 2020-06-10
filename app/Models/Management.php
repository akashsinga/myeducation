<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $fillable = [
        'full_name','father_name','department','mobile', 'email', 'password','address','type'
    ];
}
