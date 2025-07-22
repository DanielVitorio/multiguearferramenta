<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class sendNotifications extends Model
{
    use HasFactory;
    public function Consultants(){
        return $this->hasMany(sendNotifications::class);
    }

    public function isForUser($userId)
    {
        return $this->receiver == $userId;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sender',
        'Shipping_type',
        'receiver',
        'title',
        'message',
        'file',
        'data',
        'status',
    ];



    // Automatically set the sender and data attributes when creating a record
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($notification) {
            if (Auth::check()) {
                $notification->sender = Auth::user()->name; // pegará o nome do susario cadastrado
                $notification->status = Auth::user()->id; //pegará o status setado
            }
            $notification->data = Carbon::now('America/Sao_Paulo'); // Define a data e hora atual
        });
    }
}
