<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['id' => 1, 'name' => 'ایران',],
            ['id' => 2, 'name' => 'Turkey'],
        ];
        DB::table('countries')->insert($array);
    }
}
