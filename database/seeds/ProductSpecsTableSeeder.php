<?php

use Illuminate\Database\Seeder;

class ProductSpecsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['id' => 1, 'product_id' => 1, 'spec_id' => 1],
            ['id' => 2, 'product_id' => 1, 'spec_id' => 2],
        ];

        DB::table('product_specs')->insert($array);
    }
}
