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

             CategoryTableSeeder::class, # optional
             ProductTableSeeder::class, # optional
             SpecsTableSeeder::class, # optional
             ProductSpecsTableSeeder::class, #optional
             CommentTableSeeder::class, #optional
             RateTableSeeder::class, # optional

             DictionaryTableSeeder::class,
         ]);
    }
}
