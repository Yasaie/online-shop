<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(\App\Dictionary::class, function ($faker) use ($factory) {
    return [
        'table_name' => 'products',
        'key' => 'name',
    ];
});

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
    ];
});

