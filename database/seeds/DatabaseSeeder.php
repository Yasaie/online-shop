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
             CountryTableSeeder::class,
             StateTableSeeder::class,
             CityTableSeeder::class,
             LanguageTableSeeder::class,
             CurrencyTableSeeder::class,
             DictionaryTableSeeder::class,
         ]);
    }
}
