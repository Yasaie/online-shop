<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['id' => 1, 'parent_id' => null, 'category_id' => 1, 'sort' => 4],
            ['id' => 2, 'parent_id' => 1, 'category_id' => 2, 'sort' => 3],
            ['id' => 3, 'parent_id' => 2, 'category_id' => 3, 'sort' => 2],
            ['id' => 4, 'parent_id' => 3, 'category_id' => 5, 'sort' => 5],
            ['id' => 5, 'parent_id' => null, 'category_id' => 6, 'sort' => 1],
            ['id' => 6, 'parent_id' => 5, 'category_id' => 4, 'sort' => 6],
        ];

        DB::table('menus')->insert($array);
    }
}
