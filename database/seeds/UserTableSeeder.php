<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['id' => 1, 'first_name' => 'Payam', 'last_name' => 'Yasaie', 'email' => 'test@test.com', 'password' => Hash::make('123456')],
        ];

        DB::table('users')->insert($array);
    }
}
