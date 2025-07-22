<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Consultants extends Model
{
    use HasFactory;

    use HasFactory;
    public function Consultants(){
        return $this->hasMany(Consultants::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'machine_address',
        'registration',
        'timetable',
        'shift',
        'name',
        'cpf',
        'follow-up',
        'added_user',
        'status',
        'beginning',
        'end',
        'local',
        'supervisor',
        'coordinator',
        'registration_tim',
        'pin'
    ];

    protected static function booted()
    {
        //função para dar update e associar o nome do consulto no ip, onde ao colocar o ip, utomaticamente associa na outra tabela
        static::updating(function ($consultant) {
            if ($consultant->isDirty('shift') && $consultant->machine_address) {
                $oldShift = $consultant->getOriginal('shift');
                $shiftColumnMap = [
                    'MANHÃ' => 'morning',
                    'TARDE' => 'afternoon',
                    'NOITE' => 'night',
                ];

                $oldColumn = $shiftColumnMap[$oldShift] ?? null;

                if ($oldColumn) {
                    DB::table('redirected_machines')
                        ->where('address', $consultant->machine_address)
                        ->update([$oldColumn => null]);
                }
            }
        });

        static::saved(function ($consultant) {
            if ($consultant->machine_address) {
                $shiftColumnMap = [
                    'MANHÃ' => 'morning',
                    'TARDE' => 'afternoon',
                    'NOITE' => 'night',
                ];

                $newColumn = $shiftColumnMap[$consultant->shift] ?? null;

                if ($newColumn) {
                    DB::table('redirected_machines')
                        ->where('address', $consultant->machine_address)
                        ->update([$newColumn => $consultant->name]);
                }
            }
        });
    }
}