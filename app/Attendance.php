<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'pin',
        'datetime',
        'verified',
        'status',
        'workcode',
    ];
}
