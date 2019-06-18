<?php

use Illuminate\Database\Seeder;

class RateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['user_id' => 1, 'product_id' => 1, 'rate' => 3],
            ['user_id' => 2, 'product_id' => 1, 'rate' => 5],
            ['user_id' => 1, 'product_id' => 2, 'rate' => 2],
        ];
        DB::table('rates')->insert($array);
    }
}
