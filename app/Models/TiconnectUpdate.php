<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TiconnectUpdate extends Model
{
    use HasFactory;


    protected $fillable = [
        'path',
        'version',
        'updated_by',
    ];


        // Automatically set the sender and data attributes when creating a record
        protected static function boot()
        {
            parent::boot();
    
            static::creating(function ($update) {
                if (Auth::check()) {
                    $update->updated_by = Auth::user()->name . " - " . Auth::user()->username; // pegará o nome do susario cadastrado
                }
            });

            static::updating(function ($update) {
                if (Auth::check()) {
                    $update->updated_by = Auth::user()->name . " - " . Auth::user()->username; // Para atualização
                }
            });
        }
}
