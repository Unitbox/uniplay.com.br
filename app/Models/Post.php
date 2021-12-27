<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";
    
    protected $fillable = [
        'titulo', 'subtitulo', 'conteudo', 'img_background', 'autor', 'slug',
        'revisao', 'tipo', 'ordem'
    ];
}
