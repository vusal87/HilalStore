<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMehsulDetayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mehsul_detay', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mehsul_id')->unsigned()->unique();
            $table->boolean('goster_slider')->default(0);
            $table->boolean('cox_satilan')->default(0);
            $table->boolean('endirimli')->default(0);


            $table->foreign('mehsul_id')->references('id')->on('mehsul')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mehsul_detay');
    }
}
