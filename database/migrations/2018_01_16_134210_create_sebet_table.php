<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSebetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sebet', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('istifadeci_id')->unsigned();
            $table->timestamps();





            $table->foreign('istifadeci_id')->references('id')->on('istifadeci')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sebet');
    }
}
