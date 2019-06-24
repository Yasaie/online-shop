<?php

use Illuminate\Database\Seeder;

class DetailKeyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['id' => 1, 'detail_category_id' => 1],
            ['id' => 2, 'detail_category_id' => 1],
            ['id' => 3, 'detail_category_id' => 2],
        ];
        DB::table('detail_keys')->insert($array);
    }
}
