<?php

use Illuminate\Database\Seeder;

class SpecsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['id' => 1],
            ['id' => 2],
        ];

        DB::table('specs')->insert($array);
    }
}
