<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DictionaryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            ['language_id' => 'fa', 'context_id' => 1, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'ریال'],
            ['language_id' => 'en', 'context_id' => 1, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'Rial'],
            ['language_id' => 'tr', 'context_id' => 1, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'Rial'],

            ['language_id' => 'fa', 'context_id' => 2, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'تومان'],
            ['language_id' => 'en', 'context_id' => 2, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'Toman'],
            ['language_id' => 'tr', 'context_id' => 2, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'Toman'],

            ['language_id' => 'fa', 'context_id' => 3, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'دلار'],
            ['language_id' => 'en', 'context_id' => 3, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'Dollar'],
            ['language_id' => 'tr', 'context_id' => 3, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'Dolar'],

            ['language_id' => 'fa', 'context_id' => 4, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'لیر'],
            ['language_id' => 'en', 'context_id' => 4, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'Lire'],
            ['language_id' => 'tr', 'context_id' => 4, 'table_name' => 'currencies', 'key' => 'name', 'value' => 'TL'],

            # Product 1 Title
            ['language_id' => 'fa', 'context_id' => 1, 'table_name' => 'products', 'key' => 'title', 'value' => 'اس اس دی اینترنال وسترن دیجیتال'],
            ['language_id' => 'en', 'context_id' => 1, 'table_name' => 'products', 'key' => 'title', 'value' => 'SSD Western Digital'],
            # Product 1 Description
            ['language_id' => 'fa', 'context_id' => 1, 'table_name' => 'products', 'key' => 'description', 'value' => 'اس اس دی «WDS240G2G0A» محصولی از شرکت «وسترن دیجیتال» است که از طریق رابط SATA3.0 به کامپیوتر و لپ تاپ متصل می‌شود.'],
            ['language_id' => 'en', 'context_id' => 1, 'table_name' => 'products', 'key' => 'description', 'value' => 'In this article, we study how to create a Laravel controller for CRUD operations. By using resourceful controller, we get the pre-defined methods ..'],

            # Specs
            ['language_id' => 'fa', 'context_id' => 1, 'table_name' => 'specs', 'key' => 'title', 'value' => 'رنگ'],
            ['language_id' => 'en', 'context_id' => 1, 'table_name' => 'specs', 'key' => 'title', 'value' => 'Color'],

            ['language_id' => 'fa', 'context_id' => 2, 'table_name' => 'specs', 'key' => 'title', 'value' => 'وزن'],
            ['language_id' => 'en', 'context_id' => 2, 'table_name' => 'specs', 'key' => 'title', 'value' => 'Weight'],

            # Product 1 Specs
            ['language_id' => 'fa', 'context_id' => 1, 'table_name' => 'product_specs', 'key' => 'title', 'value' => 'صورتی'],
            ['language_id' => 'en', 'context_id' => 1, 'table_name' => 'product_specs', 'key' => 'title', 'value' => 'Pink'],

            ['language_id' => 'fa', 'context_id' => 2, 'table_name' => 'product_specs', 'key' => 'title', 'value' => '10 کیلوگرم'],
            ['language_id' => 'en', 'context_id' => 2, 'table_name' => 'product_specs', 'key' => 'title', 'value' => '10 KG'],

            # Category
            ['language_id' => 'fa', 'context_id' => 1, 'table_name' => 'categories', 'key' => 'title', 'value' => 'کالای دیجیتال'],
            ['language_id' => 'en', 'context_id' => 1, 'table_name' => 'categories', 'key' => 'title', 'value' => 'Digital Product'],

            ['language_id' => 'fa', 'context_id' => 2, 'table_name' => 'categories', 'key' => 'title', 'value' => 'کامپیوتر'],
            ['language_id' => 'en', 'context_id' => 2, 'table_name' => 'categories', 'key' => 'title', 'value' => 'Computer'],

            ['language_id' => 'fa', 'context_id' => 3, 'table_name' => 'categories', 'key' => 'title', 'value' => 'ماوس'],
            ['language_id' => 'en', 'context_id' => 3, 'table_name' => 'categories', 'key' => 'title', 'value' => 'Mouse'],
        ];

        DB::table('dictionaries')->insert($array);
    }
}
