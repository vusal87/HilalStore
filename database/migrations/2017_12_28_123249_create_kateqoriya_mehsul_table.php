<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKateqoriyaMehsulTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('kateqoriya_mehsul', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kateqori_id')->unsigned();
            $table->integer('mehsul_id')->unsigned();


            $table->foreign('kateqori_id')->references('id')->on('kateqori')->onDelete('cascade');
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
        Schema::dropIfExists('kateqoriya_mehsul');
    }
}
