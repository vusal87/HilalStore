<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMehsulTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mehsul', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug',150);
            $table->string('mehsul_adi',150);
            $table->text('aciqlama');
            $table->decimal('qiymeti',6,3);
            $table->timestamp('yaradilma_tarixi')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('mehsul');
    }
}
