<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $table = "equipes";
    protected $fillable = [
        'equipe', 'url_image'
    ];
}
