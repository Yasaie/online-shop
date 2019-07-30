<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['id' => 1, 'parent_id' => null, 'path' => '1', 'depth' => 1],
            ['id' => 2, 'parent_id' => 1, 'path' => '1/2', 'depth' => 2],
            ['id' => 3, 'parent_id' => 2, 'path' => '1/2/3', 'depth' => 3],
            ['id' => 4, 'parent_id' => null, 'path' => '4', 'depth' => 1],
            ['id' => 5, 'parent_id' => 4, 'path' => '4/5', 'depth' => 2],
            ['id' => 6, 'parent_id' => 4, 'path' => '4/6', 'depth' => 2],
        ];

        DB::table('categories')->insert($array);
    }
}
