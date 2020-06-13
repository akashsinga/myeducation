<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public $primaryKey='id';
    protected $table='departments';
    protected $fillable = [
        'name','hod'
    ];
}
