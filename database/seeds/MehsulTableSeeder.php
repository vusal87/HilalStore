<?php

use Illuminate\Database\Seeder;
use App\Models\mehsul;
use App\Models\MehsulDetay;


use Illuminate\Support\Facades\DB;class MehsulTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        mehsul::truncate();
        MehsulDetay::truncate();

        for ($i=0;$i<30;$i++)
        {
            $mehsul_adi=$faker->sentence(2);
            $mehsul=mehsul::create([
                'mehsul_adi'=>$mehsul_adi,
                'slug'=>str_slug($mehsul_adi),
                'aciqlama'=>$faker->sentence(20),
                'qiymeti'=>$faker->randomFloat(3,1,20)
            ]);

            $detay=$mehsul->detay()->create([
                'goster_slider'=>rand(0,1),
                'cox_satilan'=>rand(0,1),
                'endirimli'=>rand(0,1)
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
