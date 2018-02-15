<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIstifadeciTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('istifadeci', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adSoyad',60);
            $table->string('email',150)->unique();
            $table->string('shifre',60);
            $table->string('aktivasyon_acari',60)->nullable();
            $table->boolean('aktif_mi')->default(0);
            $table->boolean('admin_mi')->default(0);
            $table->rememberToken();

            $table->timestamp('yaradilma_tarixi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('guncellenme_tarixi')->default(DB::raw('CURRENT_TIMESTAMP on UPDATE
            CURRENT_TIMESTAMP'));

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
        Schema::dropIfExists('istifadeci');
    }
}
