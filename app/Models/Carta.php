<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carta extends Model
{
    protected $table = "cartas";

    protected $fillable = [
        'carta', 'idioma_id', 'categoria_id','nivel_dificuldade_id','observacao'
    ];
}