<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['id' => 'fa', 'name' => 'فارسی'],
            ['id' => 'en', 'name' => 'English'],
            ['id' => 'tr', 'name' => 'Türkçe'],
        ];

        DB::table('languages')->insert($array);
    }
}
