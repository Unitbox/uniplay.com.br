<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partida extends Model
{
    protected $table = "partidas";
    
    protected $fillable = [
        'dificuldade_id', 'idioma_id', 'qtd_jogadores_equipe', 'categoria_id', 'user_id', 'rodada'
    ];

}
