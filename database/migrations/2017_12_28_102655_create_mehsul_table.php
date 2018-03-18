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
            $table->decimal('qiymeti',10,2);
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
        Schema::dropIfExists('mehsul');
    }
}
