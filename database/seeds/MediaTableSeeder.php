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
        # Products
        $product_1 = \App\Product::find(1);

        $product_1->addMedia(base_path('resources/dummy/img/553667.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('images');
        $product_1->addMedia(base_path('resources/dummy/img/553767.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('images');

        # Catgories
        $category_1 = \App\Category::find(1);

        $category_1->addMedia(base_path('resources/dummy/img/390.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('image');

        # Carousel
        $carousel = setting('front.carousel', 0);

        $carousel->addMedia(base_path('resources/dummy/img/1000003803.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('carousel');

        $carousel->addMedia(base_path('resources/dummy/img/1000005426.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('carousel');
    }
}
