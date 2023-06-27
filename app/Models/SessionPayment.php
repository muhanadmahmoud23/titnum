<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionPayment extends Model
{
    use HasFactory;

    protected $fillable =[
        'client_id',
        'session_id'
    ];


    public function clients(){
        return $this->belongsTo(client::class,'client_id');
    }

    public function sessions(){
        return $this->belongsTo(Session::class,'session_id');
    }
}
