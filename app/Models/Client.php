<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table ='clients';
    
    protected $fillable = [
        'name',
        'membership_id',
        'mobile',
        'status',
        'email',
    ];

    public function register()
    {
        return $this->hasMany(Register::class,'client_id');
    }
}
