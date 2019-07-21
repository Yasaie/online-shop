<?php

use Illuminate\Database\Seeder;

class ProductDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['id' => 1, 'product_id' => 1, 'detail_value_id' => 1, 'highlighted' => 1],
            ['id' => 2, 'product_id' => 1, 'detail_value_id' => 3, 'highlighted' => 0],
            ['id' => 3, 'product_id' => 1, 'detail_value_id' => 4, 'highlighted' => 0],
        ];
        DB::table('product_details')->insert($array);
    }
}
