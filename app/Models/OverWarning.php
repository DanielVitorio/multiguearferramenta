<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class OverWarning extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'Plate',
        'date',
        'beginning',
        'end',
        'local',
        'requesting',
        'motive',
        'solved',
        'calling_id',
        'observation',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($overWarningVar) {
            if (Auth::check()) {
                $user = Auth::user()->name;
                $username = Auth::user()->username;
                $overWarningVar->user = $user;
                $overWarningVar->Plate = $username;
            }
        });
    }
}
