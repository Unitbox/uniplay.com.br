<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jogador extends Model
{
    protected $table = "partida_jogadores";

    protected $fillable = [
        'partida_id', 'user_id', 'equipe_id', 'rodada_partida', 'anonimo', 'pontos'
    ];

}
