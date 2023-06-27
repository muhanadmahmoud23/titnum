<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'mobile',
        'email',
        'status'
    ];

    public function coaches(){
        return $this->belongsTo(Coach::class,'coach_id');
    }
}
