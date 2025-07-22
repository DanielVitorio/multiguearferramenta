<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiconnectLdap extends Model
{
    use HasFactory;

    protected $fillable = [
        'server',
        'port',
        'user_admin',
        'password_admin',
        'domain_components',
        'filter',
    ];
}
