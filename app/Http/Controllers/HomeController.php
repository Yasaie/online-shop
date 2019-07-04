<?php

namespace App\Http\Controllers;

use App\Category;
use App\City;
use App\Country;
use App\Currency;
use App\Product;
use App\Seller;
use App\State;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

class HomeController extends Controller
{


    public function index(Request $request)
    {
//        $city = City::whereName('تبریز')->first();
//        dd($city ? $city->country : 'null');

//        dd(Currency::find(4)->locale('name'));

//        $user = factory(\App\User::class)->create();

//        $langs = ['en' => 'en_US', 'fa' => 'fa_IR', 'tr' => 'tr_TR'];
//        $fields = ['title' => 'name', 'description' => 'text', 'info' => 'address', 'data' => 'text'];
//        $product = factory(\App\Product::class, 2)->create()->each(function ($d) use ($langs, $fields) {
//            foreach ($fields as $fkey => $field) {
//                foreach ($langs as $key => $lang) {
//                    $newFaker = \Faker\Factory::create($lang);
//                    factory(\App\Dictionary::class)->create([
//                        'context_id' => $d->id,
//                        'language_id' => $key,
//                        'key' => $fkey,
//                        'value' => $newFaker->$field
//                    ]);
//                }
//            }
//        });
//        die;

//        factory(\App\Dictionary::class)->create(['context_id' => $product->id, 'language_id' => 'fa']);
//        factory(\App\Dictionary::class)->create(['context_id' => $product->id, 'language_id' => 'en']);
//        factory(\App\Dictionary::class)->create(['context_id' => $product->id, 'language_id' => 'tr']);

        // usage inside a laravel route
//        $img = Image::make('C:\Users\yasaie\Desktop\Tahlilgaran\Developer.jpg')->heighten(200)->crop(100, 200);
//        dd($request);
//        $img = Image::cache(function($image) {
//            $image->make('C:\Users\yasaie\Desktop\Stock Photos\vector-art.png')->heighten(200)->crop(100, 200);
//        }, (60 * 24 * 10), true);
////        dd($img);
//        return $img->response('png');
//        return view('welcome');


//        Seller::find(2)->delete();

        $product = Product::find(1);
        $product->addMedia('C:\Users\yasaie\Desktop\Stock Photos\php-1024x538.png')
            ->preservingOriginal()
            ->toMediaCollection('images');

//        $product->clearMediaCollection('images');
//        $image = $product->getFirstMedia()->getPath();
//        $test = $product->getMedia('images');
//        Media::setNewOrder([6,8,2]);
//        $test->save();

//        dd($product->getMedia('images')[1]->getFullUrl('small'));
//        try {
//
//        return response()->file($test);
//        } catch (FileNotFoundException $e) {
//        }
//
//
//        return app()->getLocale();
    }

}
