<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['id' => 1, 'country_id' => 1, 'name' => 'آذربایجان شرقی'],
            ['id' => 2, 'country_id' => 1, 'name' => 'آذربایجان غربی'],
            ['id' => 3, 'country_id' => 1, 'name' => 'اردبیل'],
            ['id' => 4, 'country_id' => 1, 'name' => 'اصفهان'],
            ['id' => 5, 'country_id' => 1, 'name' => 'البرز'],
            ['id' => 6, 'country_id' => 1, 'name' => 'ایلام'],
            ['id' => 7, 'country_id' => 1, 'name' => 'بوشهر'],
            ['id' => 8, 'country_id' => 1, 'name' => 'تهران'],
            ['id' => 9, 'country_id' => 1, 'name' => 'چهارمحال و بختیاری'],
            ['id' => 10, 'country_id' => 1, 'name' => 'خراسان جنوبی'],
            ['id' => 11, 'country_id' => 1, 'name' => 'خراسان رضوی'],
            ['id' => 12, 'country_id' => 1, 'name' => 'خراسان شمالی'],
            ['id' => 13, 'country_id' => 1, 'name' => 'خوزستان'],
            ['id' => 14, 'country_id' => 1, 'name' => 'زنجان'],
            ['id' => 15, 'country_id' => 1, 'name' => 'سمنان'],
            ['id' => 16, 'country_id' => 1, 'name' => 'سیستان و بلوچستان'],
            ['id' => 17, 'country_id' => 1, 'name' => 'فارس'],
            ['id' => 18, 'country_id' => 1, 'name' => 'قزوین'],
            ['id' => 19, 'country_id' => 1, 'name' => 'قم'],
            ['id' => 20, 'country_id' => 1, 'name' => 'کردستان'],
            ['id' => 21, 'country_id' => 1, 'name' => 'کرمان'],
            ['id' => 22, 'country_id' => 1, 'name' => 'کرمانشاه'],
            ['id' => 23, 'country_id' => 1, 'name' => 'کهگیلویه و بویراحمد'],
            ['id' => 24, 'country_id' => 1, 'name' => 'گلستان'],
            ['id' => 25, 'country_id' => 1, 'name' => 'گیلان'],
            ['id' => 26, 'country_id' => 1, 'name' => 'لرستان'],
            ['id' => 27, 'country_id' => 1, 'name' => 'مازندران'],
            ['id' => 28, 'country_id' => 1, 'name' => 'مرکزی'],
            ['id' => 29, 'country_id' => 1, 'name' => 'هرمزگان'],
            ['id' => 30, 'country_id' => 1, 'name' => 'همدان'],
            ['id' => 31, 'country_id' => 1, 'name' => 'یزد'],
            ['id' => 32, 'country_id' => 2, 'name' => 'Istanbul'],
        ];

        DB::table('states')->insert($array);
    }
}
