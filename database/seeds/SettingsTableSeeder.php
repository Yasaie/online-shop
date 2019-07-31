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
        $site = [
            [
                'section' => 'site',
                'key' => 'title',
                'type' => 'text',
                'value' => null
            ],
        ];
        $footer = [
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
            [
                'section' => 'footer',
                'key' => 'block3.title',
                'type' => 'text',
                'value' => null
            ],
            [
                'section' => 'footer',
                'key' => 'block3.body',
                'type' => 'texthtml',
                'value' => null
            ],
            [
                'section' => 'footer',
                'key' => 'block4.title',
                'type' => 'text',
                'value' => null
            ],
            [
                'section' => 'footer',
                'key' => 'block4.body',
                'type' => 'texthtml',
                'value' => null
            ],
        ];
        $slider = [
            [
                'section' => 'front',
                'key' => 'carousel',
                'type' => 'file',
                'value' => null
            ],
            [
                'section' => 'front',
                'key' => 'slider.1',
                'type' => 'select',
                'value' => 1
            ],
            [
                'section' => 'front',
                'key' => 'slider.2',
                'type' => 'select',
                'value' => 4
            ],
        ];

        $array = array_merge($site, $footer, $slider);

        DB::table('settings')->insert($array);
    }
}
