<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    protected $table = 'register';

    protected $fillable = [
        'client_id',
        'next_date',
        'end_date'
    ];

    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
