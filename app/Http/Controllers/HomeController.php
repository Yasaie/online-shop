<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Currency;
use App\State;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
//        $city = City::whereName('تبریز')->first();
//        dd($city ? $city->country : 'null');

        dd(Currency::find(4)->locale('name'));
        return view('welcome');
    }

}
