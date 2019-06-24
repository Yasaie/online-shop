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
                'section'   => 'site',
                'key'       => 'title',
                'value'     => null
            ],
            [
                'section'   => 'footer',
                'key'       => 'block1.title',
                'value'     => null
            ],
            [
                'section'   => 'footer',
                'key'       => 'block1.body',
                'value'     => null
            ],
            [
                'section'   => 'footer',
                'key'       => 'block2.title',
                'value'     => null
            ],
            [
                'section'   => 'footer',
                'key'       => 'block2.body',
                'value'     => null
            ],
        ];

        DB::table('settings')->insert($array);
    }
}
