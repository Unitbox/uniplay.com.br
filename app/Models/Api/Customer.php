<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = "Customer";

    protected $fillable = [
        'type',
        'name',
        'cpf',
        'rg', 
        'email', 
        'gender', 
        'phone' 
    ];

    public $timestamps = false;

}
