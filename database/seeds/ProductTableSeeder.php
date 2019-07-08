<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
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
                'id' => 1,
                'category_id' => 3,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => 2,
                'category_id' => 5,
                'created_at' => \Carbon\Carbon::now()->addDays(1),
                'updated_at' => \Carbon\Carbon::now()->addDays(1.2)
            ],
        ];

        DB::table('products')->insert($array);
    }
}
