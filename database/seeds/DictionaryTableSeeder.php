<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DictionaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['language_id' => 'fa', 'context_id' => 1, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'ریال'],
            ['language_id' => 'en', 'context_id' => 1, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'Rial'],
            ['language_id' => 'tr', 'context_id' => 1, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'Rial'],

            ['language_id' => 'fa', 'context_id' => 2, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'تومان'],
            ['language_id' => 'en', 'context_id' => 2, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'Toman'],
            ['language_id' => 'tr', 'context_id' => 2, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'Toman'],

            ['language_id' => 'fa', 'context_id' => 3, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'دلار'],
            ['language_id' => 'en', 'context_id' => 3, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'Dollar'],
            ['language_id' => 'tr', 'context_id' => 3, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'Dolar'],

            ['language_id' => 'fa', 'context_id' => 4, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'لیر'],
            ['language_id' => 'en', 'context_id' => 4, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'Lire'],
            ['language_id' => 'tr', 'context_id' => 4, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'TL'],
        ];

        DB::table('dictionaries')->insert($array);
    }
}
