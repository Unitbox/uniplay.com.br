<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{   
    protected $table = "ProductsSold";

    protected $fillable = [
        'product_id', 'sku', 'variant_id', 'price','original_price','quantity', 'order_id'
    ];

    public $timestamps  = false;

}
