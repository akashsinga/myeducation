<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeavesAvailable extends Model
{
    protected $table="leavesavailable";
    protected $fillable = ['start_date','end_date','available'];
}
