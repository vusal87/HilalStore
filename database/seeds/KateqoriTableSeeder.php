<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KateqoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('kateqori')->truncate();
        $id=DB::table('kateqori')->insertGetId(['kateqori_adi'=>'Elektronik','slug'=>'elektronik']);
        DB::table('kateqori')->insert(['kateqori_adi'=>'Noutbuk/tablet','slug'=>'Noutbuk-tablet','ust_id'=>$id]);
        DB::table('kateqori')->insert(['kateqori_adi'=>'Telefon','slug'=>'telefon','ust_id'=>$id]);
        DB::table('kateqori')->insert(['kateqori_adi'=>'Tv','slug'=>'televizor','ust_id'=>$id]);
        DB::table('kateqori')->insert(['kateqori_adi'=>'kamera','slug'=>'kamera','ust_id'=>$id]);

        $id=DB::table('kateqori')->insertGetId(['kateqori_adi'=>'Kitab','slug'=>'Kitab']);
        DB::table('kateqori')->insert(['kateqori_adi'=>'Edebiyyat','slug'=>'edebiyyat','ust_id'=>$id]);
        DB::table('kateqori')->insert(['kateqori_adi'=>'cebr','slug'=>'riyaziyyat','ust_id'=>$id]);
        DB::table('kateqori')->insert(['kateqori_adi'=>'emekTelimi','slug'=>'telim','ust_id'=>$id]);

        DB::table('kateqori')->insert(['kateqori_adi'=>'Dergi','slug'=>'Dergi']);
        DB::table('kateqori')->insert(['kateqori_adi'=>'Mebel','slug'=>'mebel']);
        DB::table('kateqori')->insert(['kateqori_adi'=>'Dekarasiya','slug'=>'dekarasiya']);
        DB::table('kateqori')->insert(['kateqori_adi'=>'Kasmetika','slug'=>'kasmetika']);
        DB::table('kateqori')->insert(['kateqori_adi'=>'Kishisel Bakim','slug'=>'kishisel bakim']);
        DB::table('kateqori')->insert(['kateqori_adi'=>'Giyim ve Moda','slug'=>'giyim ve moda']);
        DB::table('kateqori')->insert(['kateqori_adi'=>'Ana ve Ushag','slug'=>'Ana ve Ushag']);
    }
}
