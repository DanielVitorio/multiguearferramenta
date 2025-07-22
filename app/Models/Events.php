<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Events extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'responsible',
        'color',
        'assign',
        'start_at',
        'end_at',
        'content',
    ];

    protected $casts = [
        'assign' => 'array',
        'color' => 'array',
    ];// seta para o mysql o tipo de valor


    // Automatically set the sender and data attributes when creating a record
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($Events) {
            if (Auth::check()) {
                $Events->responsible = Auth::user()->name; //pegará apenas o nome do usuario autenticado
            }
        });
    }
}
