<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class approved extends Model
{
    use HasFactory;

    public function approved(){
        return $this->hasMany(approved::class);
    }
}
