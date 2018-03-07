<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSebetMehsulTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(/**
         * @param Blueprint $table
         */
            'sebet_mehsul', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('sebet_id')->unsigned();
            $table->integer('mehsul_id')->unsigned();
            $table->integer('eded');
            $table->decimal('qiymeti',5,2);
            $table->string('veziyyet',30);


            $table->timestamp('yaradilma_tarixi');
            $table->timestamp('guncellenme_tarixi')->default(DB::raw('CURRENT_TIMESTAMP on UPDATE
            CURRENT_TIMESTAMP'));

            $table->timestamp('silinme_tarixi')->nullable();

            $table->foreign('sebet_id')->references('id')->on('sebet')->onDelete('cascade');
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
        Schema::dropIfExists('sebet_mehsul');
    }
}
