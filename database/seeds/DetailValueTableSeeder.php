<?php

use Illuminate\Database\Seeder;

class DetailValueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['id' => 1, 'detail_key_id' => 1],
            ['id' => 2, 'detail_key_id' => 1],
            ['id' => 3, 'detail_key_id' => 2],
            ['id' => 4, 'detail_key_id' => 3],
        ];

        DB::table('detail_values')->insert($array);
    }
}
