<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    protected $fillable = [
        'user_id','designation','qualification','salary','leaves'
    ];
}
