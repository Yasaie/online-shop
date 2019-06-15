<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['id' => 1, 'language_id' => 'fa', 'ratio' => 1],
            ['id' => 2, 'language_id' => null, 'ratio' => 0.1],
            ['id' => 3, 'language_id' => 'en', 'ratio' => 130000],
            ['id' => 4, 'language_id' => 'tr', 'ratio' => 22000],
        ];

        DB::table('currencies')->insert($array);
    }
}
