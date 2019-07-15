<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
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
                'section' => 'site',
                'key' => 'title',
                'type' => 'text',
                'value' => null
            ],
            [
                'section' => 'footer',
                'key' => 'block1.title',
                'type' => 'text',
                'value' => null
            ],
            [
                'section' => 'footer',
                'key' => 'block1.body',
                'type' => 'texthtml',
                'value' => null
            ],
            [
                'section' => 'footer',
                'key' => 'block2.title',
                'type' => 'text',
                'value' => null
            ],
            [
                'section' => 'footer',
                'key' => 'block2.body',
                'type' => 'texthtml',
                'value' => null
            ],
        ];

        DB::table('settings')->insert($array);
    }
}
