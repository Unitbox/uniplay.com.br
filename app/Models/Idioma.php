<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    protected $table = "idiomas";

    // seguranca 
    protected $fillable = [
        'idioma', 'url_image'
    ];

}