<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id')->nullable();
            $table->string('order_code')->nullable();
            $table->integer('point_sale')->nullable();
            //metodo de entrega
            $table->string('shipment')->nullable();
            //frete 
            $table->decimal('shipment_value')->nullable();
            $table->string('payment_form')->nullable();

            //Pedidos tabela sc
            $table->decimal('value_items')->nullable();
            $table->decimal('total_purchase_amount')->nullable();
            $table->decimal('discount')->nullable();
            $table->decimal('order_status')->nullable();
            $table->integer('payment_status')->nullable();
            $table->integer('delivery_method')->nullable();
            $table->integer('store_id')->nullable();
            $table->string('zip_delivery')->nullable();
            $table->string('delivery_address')->nullable();
            $table->string('city_delivery')->nullable();
            $table->string('neighborhood_delivery')->nullable();
            $table->integer('number_delivery')->nullable();
            $table->string('complement_delivery')->nullable();
            $table->string('state_delivery')->nullable();
            $table->date('expected_deadline')->nullable();
            $table->boolean('concluded_delivery')->nullable();
            $table->string('transaction_token')->nullable();
            $table->string('url_checkout')->nullable();
            $table->string('cod_checkout')->nullable();
            //id lojas fretes
            $table->integer('id_stores_freight_details')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
