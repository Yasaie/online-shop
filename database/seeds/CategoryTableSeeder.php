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
            ['id' => 1, 'parent_id' => null],
            ['id' => 2, 'parent_id' => 1],
            ['id' => 3, 'parent_id' => 2],
            ['id' => 4, 'parent_id' => null],
            ['id' => 5, 'parent_id' => 4],
            ['id' => 6, 'parent_id' => 4],
        ];

        DB::table('categories')->insert($array);
    }
}
