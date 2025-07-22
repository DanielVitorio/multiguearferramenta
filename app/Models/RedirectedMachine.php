<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedirectedMachine extends Model
{
    use HasFactory;

    public function RedirectedMachine(){
        return $this->hasMany(RedirectedMachine::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address',
        'hostname',
        'operating_system',
        'location',
        'follow-up',
        'status',
        'disk',
        'site',
        'morning',
        'afternoon',
        'night',
        // Adicione outras colunas que deseja permitir a atribuição em massa
    ];
}
