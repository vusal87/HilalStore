<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(KateqoriTableSeeder::class);
        $this->call(MehsulTableSeeder::class);
        $this->call(Istifaeciseeder::class);
    }
}