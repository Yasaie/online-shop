<?php

use Illuminate\Database\Seeder;

class SellerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'user_id'       => 1,
                'product_id'    => 1,
                'currency_id'   => 1,
                'price'         => 5000000,
                'amount'        => 5,
                'created_at'    => \Carbon\Carbon::now(),
                'updated_at'    => \Carbon\Carbon::now(),
            ],
            [
                'user_id'       => 1,
                'product_id'    => 1,
                'currency_id'   => 2,
                'price'         => 457500,
                'amount'        => 3,
                'created_at'    => \Carbon\Carbon::now(),
                'updated_at'    => \Carbon\Carbon::now(),
            ],
            [
                'user_id'       => 2,
                'product_id'    => 1,
                'currency_id'   => 3,
                'price'         => 40,
                'amount'        => 2,
                'created_at'    => \Carbon\Carbon::now(),
                'updated_at'    => \Carbon\Carbon::now(),
            ],
        ];

        DB::table('sellers')->insert($array);
    }
}
