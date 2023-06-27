<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $table ='classes';
    protected $fillable = [
        'name',
        'coach_id',
        'day',
        'start_at',
        'duration',
        'from_date',
        'to_date',
    ];

}
