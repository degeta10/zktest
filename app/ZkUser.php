<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZkUser extends Model
{
    protected $fillable = [
        'pin',
        'name',
        'password',
        'privilege',
        'pin2',
        'group',
        'card',
        'tz1',
        'tz2',
        'tz3',
    ];
}
