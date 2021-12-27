<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "order";

    protected $fillable = [
        'order_code',
        'point_sale',
        'shipment',
        'shipment_value',
        'payment_form',
        'value_items',
        'total_purchase_amount',
        'discount',
        'order_status',
        'payment_status',
        'delivery_method',
        'store_id',
        'zip_delivery',
        'delivery_address',
        'city​_delivery',
        'neighborhood_delivery',
        'number_delivery',
        'complement_delivery',
        'state_delivery',
        'expected_deadline',
        'concluded_delivery',
        'transaction_token',
        'url_checkout',
        'cod_checkout',
        'id_stores_freight_details',
    ];

    public $timestamps  = true;
}
