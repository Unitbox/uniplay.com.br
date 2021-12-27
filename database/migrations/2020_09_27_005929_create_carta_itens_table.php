<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartaItensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carta_itens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('texto');
            $table->integer('pontuacao');
            $table->string('acao');
            $table->unsignedBigInteger('carta_id');
            $table->integer('ordem');
    
            $table->timestamps();

            $table->foreign('carta_id')->references('id')->on('cartas')->onDelete('CASCADE');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carta_itens');
    }
}
