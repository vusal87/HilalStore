<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKateqoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kateqori', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ust_id')->nullable();
            $table->string('kateqori_adi',30);
            $table->string('slug',40);
            $table->timestamp('yaradilma_tarixi');
            $table->timestamp('guncellenme_tarixi')->default(DB::raw('CURRENT_TIMESTAMP on UPDATE
            CURRENT_TIMESTAMP'));
            //$table->softDeletes();
            $table->timestamp('silinme_tarixi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kateqori');
    }
}
