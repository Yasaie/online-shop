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
                'seller_service_id' => 1,
                'price'         => 5000000,
                'prev_price'    => 5547854,
                'amount'        => 5,
                'deleted_at'    => null,
            ],
            [
                'user_id'       => 1,
                'product_id'    => 1,
                'currency_id'   => 2,
                'seller_service_id' => null,
                'price'         => 457500,
                'prev_price'    => 480000,
                'amount'        => 3,
                'deleted_at'    => null,
            ],
            [
                'user_id'       => 1,
                'product_id'    => 1,
                'currency_id'   => 2,
                'seller_service_id' => null,
                'price'         => 606555,
                'prev_price'    => null,
                'amount'        => 8,
                'deleted_at'    => \Carbon\Carbon::now(),
            ],
            [
                'user_id'       => 2,
                'product_id'    => 1,
                'currency_id'   => 3,
                'seller_service_id' => null,
                'price'         => 40,
                'prev_price'    => null,
                'amount'        => 2,
                'deleted_at'    => null,
            ],
        ];

        DB::table('sellers')->insert($array);
    }
}
