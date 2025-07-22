<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZabbixApi extends Model
{
    use HasFactory;

    protected $fillable = [
            'local',
            'host',
            'user',
            'password',
    ];
}
