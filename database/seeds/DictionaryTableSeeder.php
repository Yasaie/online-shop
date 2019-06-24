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
            # App\Currency
            ['language_id' => 'fa', 'context_id' => 1, 'context_type' => 'App\Currency', 'key' => 'name', 'value' => 'ریال'],
            ['language_id' => 'en', 'context_id' => 1, 'context_type' => 'App\Currency', 'key' => 'name', 'value' => 'Rial'],
            ['language_id' => 'tr', 'context_id' => 1, 'context_type' => 'App\Currency', 'key' => 'name', 'value' => 'Rial'],

            ['language_id' => 'fa', 'context_id' => 2, 'context_type' => 'App\Currency', 'key' => 'name', 'value' => 'تومان'],
            ['language_id' => 'en', 'context_id' => 2, 'context_type' => 'App\Currency', 'key' => 'name', 'value' => 'Toman'],
            ['language_id' => 'tr', 'context_id' => 2, 'context_type' => 'App\Currency', 'key' => 'name', 'value' => 'Toman'],

            ['language_id' => 'fa', 'context_id' => 3, 'context_type' => 'App\Currency', 'key' => 'name', 'value' => 'دلار'],
            ['language_id' => 'en', 'context_id' => 3, 'context_type' => 'App\Currency', 'key' => 'name', 'value' => 'Dollar'],
            ['language_id' => 'tr', 'context_id' => 3, 'context_type' => 'App\Currency', 'key' => 'name', 'value' => 'Dolar'],

            ['language_id' => 'fa', 'context_id' => 4, 'context_type' => 'App\Currency', 'key' => 'name', 'value' => 'لیر'],
            ['language_id' => 'en', 'context_id' => 4, 'context_type' => 'App\Currency', 'key' => 'name', 'value' => 'Lire'],
            ['language_id' => 'tr', 'context_id' => 4, 'context_type' => 'App\Currency', 'key' => 'name', 'value' => 'TL'],

            # App\Product
            ['language_id' => 'fa', 'context_id' => 1, 'context_type' => 'App\Product', 'key' => 'title', 'value' => 'اس اس دی اینترنال وسترن دیجیتال'],
            ['language_id' => 'en', 'context_id' => 1, 'context_type' => 'App\Product', 'key' => 'title', 'value' => 'SSD Western Digital'],

            ['language_id' => 'fa', 'context_id' => 1, 'context_type' => 'App\Product', 'key' => 'description', 'value' => 'اس اس دی «WDS240G2G0A» محصولی از شرکت «وسترن دیجیتال» است که از طریق رابط SATA3.0 به کامپیوتر و لپ تاپ متصل می‌شود.'],
            ['language_id' => 'en', 'context_id' => 1, 'context_type' => 'App\Product', 'key' => 'description', 'value' => 'In this article, we study how to create a Laravel controller for CRUD operations. By using resourceful controller, we get the pre-defined methods ..'],

            # App\DetailCategory
            ['language_id' => 'fa', 'context_id' => 1, 'context_type' => 'App\DetailCategory', 'key' => 'title', 'value' => 'مشخصات فیزیکی'],
            ['language_id' => 'en', 'context_id' => 1, 'context_type' => 'App\DetailCategory', 'key' => 'title', 'value' => 'Physical Specifications'],

            ['language_id' => 'fa', 'context_id' => 2, 'context_type' => 'App\DetailCategory', 'key' => 'title', 'value' => 'سایر مشخصات'],
            ['language_id' => 'en', 'context_id' => 2, 'context_type' => 'App\DetailCategory', 'key' => 'title', 'value' => 'Other Features'],

            # App\DetailKey
            ['language_id' => 'fa', 'context_id' => 1, 'context_type' => 'App\DetailKey', 'key' => 'title', 'value' => 'وزن'],
            ['language_id' => 'en', 'context_id' => 1, 'context_type' => 'App\DetailKey', 'key' => 'title', 'value' => 'Weight'],

            ['language_id' => 'fa', 'context_id' => 2, 'context_type' => 'App\DetailKey', 'key' => 'title', 'value' => 'رنگ'],
            ['language_id' => 'en', 'context_id' => 2, 'context_type' => 'App\DetailKey', 'key' => 'title', 'value' => 'Color'],

            ['language_id' => 'fa', 'context_id' => 3, 'context_type' => 'App\DetailKey', 'key' => 'title', 'value' => 'باتری'],
            ['language_id' => 'en', 'context_id' => 3, 'context_type' => 'App\DetailKey', 'key' => 'title', 'value' => 'Battery'],

            # App\DetailValue
            ['language_id' => 'fa', 'context_id' => 1, 'context_type' => 'App\DetailValue', 'key' => 'title', 'value' => '۱۰۰ کیلوگرم'],
            ['language_id' => 'en', 'context_id' => 1, 'context_type' => 'App\DetailValue', 'key' => 'title', 'value' => '100 KG'],

            ['language_id' => 'fa', 'context_id' => 2, 'context_type' => 'App\DetailValue', 'key' => 'title', 'value' => '۲۰ گرم'],
            ['language_id' => 'en', 'context_id' => 2, 'context_type' => 'App\DetailValue', 'key' => 'title', 'value' => '10 gr'],

            ['language_id' => 'fa', 'context_id' => 3, 'context_type' => 'App\DetailValue', 'key' => 'title', 'value' => 'آبی'],
            ['language_id' => 'en', 'context_id' => 3, 'context_type' => 'App\DetailValue', 'key' => 'title', 'value' => 'Blue'],

            ['language_id' => 'fa', 'context_id' => 4, 'context_type' => 'App\DetailValue', 'key' => 'title', 'value' => 'دارد'],
            ['language_id' => 'en', 'context_id' => 4, 'context_type' => 'App\DetailValue', 'key' => 'title', 'value' => 'Has'],

            # App\Seller
            ['language_id' => 'fa', 'context_id' => 1, 'context_type' => 'App\Seller', 'key' => 'type', 'value' => 'صورتی + گارانتی آراد'],
            ['language_id' => 'en', 'context_id' => 1, 'context_type' => 'App\Seller', 'key' => 'type', 'value' => 'Pink + Arad Warranty'],

            # App\Category
            ['language_id' => 'fa', 'context_id' => 1, 'context_type' => 'App\Category', 'key' => 'title', 'value' => 'کالای دیجیتال'],
            ['language_id' => 'en', 'context_id' => 1, 'context_type' => 'App\Category', 'key' => 'title', 'value' => 'Digital Product'],

            ['language_id' => 'fa', 'context_id' => 2, 'context_type' => 'App\Category', 'key' => 'title', 'value' => 'کامپیوتر'],
            ['language_id' => 'en', 'context_id' => 2, 'context_type' => 'App\Category', 'key' => 'title', 'value' => 'Computer'],

            ['language_id' => 'fa', 'context_id' => 3, 'context_type' => 'App\Category', 'key' => 'title', 'value' => 'ماوس'],
            ['language_id' => 'en', 'context_id' => 3, 'context_type' => 'App\Category', 'key' => 'title', 'value' => 'Mouse'],

            ['language_id' => 'fa', 'context_id' => 4, 'context_type' => 'App\Category', 'key' => 'title', 'value' => 'آشپزخانه'],
            ['language_id' => 'en', 'context_id' => 4, 'context_type' => 'App\Category', 'key' => 'title', 'value' => 'Kitchen'],

            ['language_id' => 'fa', 'context_id' => 5, 'context_type' => 'App\Category', 'key' => 'title', 'value' => 'یخچال'],
            ['language_id' => 'en', 'context_id' => 5, 'context_type' => 'App\Category', 'key' => 'title', 'value' => 'Refrigerator'],

            ['language_id' => 'fa', 'context_id' => 6, 'context_type' => 'App\Category', 'key' => 'title', 'value' => 'فرگاز'],
            ['language_id' => 'en', 'context_id' => 6, 'context_type' => 'App\Category', 'key' => 'title', 'value' => 'Oven'],

            # App\Setting
            ['language_id' => 'fa', 'context_id' => 1, 'context_type' => 'App\Setting', 'key' => 'value', 'value' => 'فروشگاه ترکان ایپک یولو'],
            ['language_id' => 'en', 'context_id' => 1, 'context_type' => 'App\Setting', 'key' => 'value', 'value' => 'Turkan Ipek Yolu Shop'],

            ['language_id' => 'fa', 'context_id' => 2, 'context_type' => 'App\Setting', 'key' => 'value', 'value' => 'بلاک ۱'],
            ['language_id' => 'en', 'context_id' => 2, 'context_type' => 'App\Setting', 'key' => 'value', 'value' => 'Block 1'],

            ['language_id' => 'fa', 'context_id' => 3, 'context_type' => 'App\Setting', 'key' => 'value', 'value' => '<ul><li>تست ۱</li><li>تست ۲</li></ul>'],
            ['language_id' => 'en', 'context_id' => 3, 'context_type' => 'App\Setting', 'key' => 'value', 'value' => '<ul><li>Test 1</li><li>Test 2</li></ul>'],

            ['language_id' => 'fa', 'context_id' => 4, 'context_type' => 'App\Setting', 'key' => 'value', 'value' => 'بلاک 2'],
            ['language_id' => 'en', 'context_id' => 4, 'context_type' => 'App\Setting', 'key' => 'value', 'value' => 'Block 2'],

            ['language_id' => 'fa', 'context_id' => 5, 'context_type' => 'App\Setting', 'key' => 'value', 'value' => '<ul><li>تست ۱</li><li>تست ۲</li></ul>'],
            ['language_id' => 'en', 'context_id' => 5, 'context_type' => 'App\Setting', 'key' => 'value', 'value' => '<ul><li>Test 1</li><li>Test 2</li></ul>'],

        ];

        DB::table('dictionaries')->insert($array);
    }
}
