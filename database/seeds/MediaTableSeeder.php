<?php

use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $media = [
            [
                'id' => '1',
                'model_type' => 'App\\Product',
                'model_id' => '1',
                'collection_name' => 'images',
                'name' => 'vector-art - Copy',
                'file_name' => 'vector-art---Copy.png',
                'mime_type' => 'image/png',
                'disk' => 'public',
                'size' => '197654',
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"small":true}}',
                'responsive_images' => '[]',
                'order_column' => '1',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'id' => '2',
                'model_type' => 'App\\Product',
                'model_id' => '1',
                'collection_name' => 'images',
                'name' => 'shutterstock_318368642',
                'file_name' => 'shutterstock_318368642.jpg',
                'mime_type' => 'image/png',
                'disk' => 'public',
                'size' => '349352',
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"small":true}}',
                'responsive_images' => '[]',
                'order_column' => '2',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'id' => '3',
                'model_type' => 'App\\Product',
                'model_id' => '1',
                'collection_name' => 'images',
                'name' => 'php-1024x538',
                'file_name' => 'php-1024x538.png',
                'mime_type' => 'image/png',
                'disk' => 'public',
                'size' => '63011',
                'manipulations' => '[]',
                'custom_properties' => '{"generated_conversions":{"small":true}}',
                'responsive_images' => '[]',
                'order_column' => '3',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
        ];

        DB::table('media')->insert($media);
    }
}
