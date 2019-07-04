<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             UserTableSeeder::class,
             CountryTableSeeder::class,
             StateTableSeeder::class,
             CityTableSeeder::class,
             LanguageTableSeeder::class,
             CurrencyTableSeeder::class,
             SettingsTableSeeder::class,

             # optional
             CategoryTableSeeder::class,
             ProductTableSeeder::class,
             DetailCategoryTableSeeder::class,
             DetailKeyTableSeeder::class,
             DetailValueTableSeeder::class,
             ProductDetailTableSeeder::class,
             CommentTableSeeder::class,
             RateTableSeeder::class,
             SellerServicesTableSeeder::class,
             SellerTableSeeder::class,
             MediaTableSeeder::class,
             # optional

             DictionaryTableSeeder::class,
         ]);
    }
}
