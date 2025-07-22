<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Posts extends Model
{
    use HasFactory;

    public function Consultants(){
        return $this->hasMany(Posts::class);
    }


     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user',
        'site',
        'title',
        'content',
        'image',
        'tag',
        'published',
        'notification',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'tag' => 'array',
        'published' => 'boolean',
        'notification' => 'boolean',
    ];

     // Automatically set the sender and data attributes when creating a record
     protected static function boot()
     {
         parent::boot();
 
         static::creating(function ($post) {
             if (Auth::check()) {
                 $post->user = Auth::user()->name; // Ajuste conforme necessário   
             }
         });
     }
}
