<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartidaEquipe extends Model
{
    protected $table = "partidas_equipes";

    protected $fillable = [
        'partida_id',
        'user_id',
        'equipe_id',
        'rodada_partida_vez',
        'rodada_partida_config',
        'anonimo',
        'pontos',
    ];
}
