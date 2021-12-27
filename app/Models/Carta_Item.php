<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carta_Item extends Model
{
    protected $table = "carta_itens";

    protected $fillable = [
        'texto', 'pontuacao', 'acao','carta_id','created_at'
    ];
}