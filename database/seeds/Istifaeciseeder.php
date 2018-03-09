<?php

use Illuminate\Database\Seeder;
use App\Models\istifadeci;
use App\Models\istifadeci_melumat;
USE Illuminate\Support\Facades\DB;

class Istifaeciseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        istifadeci::truncate();
        istifadeci_melumat::truncate();

        $istifadeci_idareeden=istifadeci::create([
            'adSoyad'=>'vusal haciyev',
            'email'=>'vus@mail.ru',
            'shifre'=>bcrypt(123456),
            'aktif_mi'=>1,
            'admin_mi'=>1
        ]);
        $istifadeci_idareeden->melumat()->create([
            'adres'=>'baki',
            'ev_telefonu'=>'(050)4552122',
            'el_telefonu'=>'(555)6666666'
        ]);
//        for ($i=0;$i<50;$i++)
//        {
//            $istifadeci_mushteri=istifadeci::create([
//                'adSoyad'=>$faker->name,
//                'email'=>$faker->unique()->safeEmail,
//                'shifre'=>bcrypt(123456),
//                'aktif_mi'=>1,
//                'admin_mi'=>0
//            ]);
//            $istifadeci_mushteri->melumat()->create([
//                'adres'=>$faker->address,
//                'ev_telefonu'=>$faker->phonenumber,
//                'el_telefonu'=>$faker->phonenumber
//            ]);
//
//        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
