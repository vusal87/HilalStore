<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSifarishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sifarish', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sebet_id')->unsigned()->unique();
            $table->decimal('sifarish_deyeri',10,4);
            $table->string('veziyyet',30)->nullable();
            $table->string('bank',20)->nullable();


            $table->string('adSoyad',50)->nullable();
            $table->string('adres',200)->nullable();
            $table->string('ev_telefon',25)->nullable();
            $table->string('el_telefon',25)->nullable();


            $table->timestamps();
            $table->foreign('sebet_id')->references('id')->on('sebet')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sifarish');
    }
}
