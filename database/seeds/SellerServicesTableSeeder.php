<?php

use Illuminate\Database\Seeder;

class SellerServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['id' => 1]
        ];

        DB::table('seller_services')->insert($array);
    }
}
