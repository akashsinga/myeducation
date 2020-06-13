<?php

namespace App\Models;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $primaryKey='id';
    protected $table='subjects';
    protected $fillable = [
        'code','name','credits','department'
    ];
}
