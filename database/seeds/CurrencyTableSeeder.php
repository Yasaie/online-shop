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
            ['id' => 1, 'language_id' => 'fa', 'key' => 'irr', 'symbol' => null, 'ratio' => 1, 'places' => 0],
            ['id' => 2, 'language_id' => null, 'key' => 'irt', 'symbol' => null, 'ratio' => 10, 'places' => 0],
            ['id' => 3, 'language_id' => 'en', 'key' => 'usd', 'symbol' => '$', 'ratio' => 130000, 'places' => 2],
            ['id' => 4, 'language_id' => 'tr', 'key' => 'try', 'symbol' => '₺', 'ratio' => 22000, 'places' => 2],
        ];

        DB::table('currencies')->insert($array);
    }
}
