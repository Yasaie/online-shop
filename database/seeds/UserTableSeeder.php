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
            [
                'id' => 1,
                'first_name' => 'Payam',
                'last_name' => 'Yasaie',
                'email' => 'test@test.com',
                'password' => Hash::make('123456'),
                'email_verified_at' => \Carbon\Carbon::now(),
            ],
            [
                'id' => 2,
                'first_name' => 'Iraj',
                'last_name' => 'Azarvand',
                'email' => 'test2@test.com',
                'password' => Hash::make('123456'),
                'email_verified_at' => \Carbon\Carbon::now(),
            ],
        ];

        DB::table('users')->insert($array);
    }
}
