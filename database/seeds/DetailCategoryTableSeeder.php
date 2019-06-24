<?php

use Illuminate\Database\Seeder;

class DetailCategoryTableSeeder extends Seeder
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
        DB::table('detail_categories')->insert($array);
    }
}
