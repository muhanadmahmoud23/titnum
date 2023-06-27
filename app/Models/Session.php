<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'coach_id',
        'day',
        'session_time',
        'duartion',
        'applicable_from',
        'applicable_to',
        'seats',
        'reserved'
    ];

    public function coaches(){
        return $this->belongsTo(Coach::class,'coach_id');
    }

    public function sessionPayment(){
        return $this->hasMany(sessionPayment::class,'session_id');
    }
}
