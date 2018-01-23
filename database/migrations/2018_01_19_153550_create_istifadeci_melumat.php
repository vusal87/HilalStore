<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIstifadeciMelumat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('istifadeci_melumat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('istifadeci_id')->unsigned();
            $table->string('adres',200)->nullable();
            $table->string('ev_telefonu',50)->nullable();
            $table->string('el_telefonu',50)->nullable();

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
        Schema::dropIfExists('istifadeci_melumat');
    }
}
