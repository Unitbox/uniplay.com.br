<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";

    protected $fillable = [
        'estoque', 'sku', 'titulo','marca','categoria', 'status','preco','status','created_at','updated_at'
    ];

    public $timestamps  = false;
}
