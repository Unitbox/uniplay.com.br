<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsRedesSociaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_redes_sociais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idpost')->nullable();
            $table->text('media_url')->nullable();
            $table->string('media_type')->nullable();
            $table->string('permalink')->nullable();
            $table->text('thumbnail_url')->nullable();
            $table->string('username')->nullable();
            $table->text('description')->nullable();
            $table->timestamp('timestamp')->nullable();
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
        Schema::dropIfExists('posts_redes_sociais');
    }
}
