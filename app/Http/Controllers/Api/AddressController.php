<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\Country;
use App\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    public function country()
    {
        return Country::all();
    }

    public function state($country)
    {
        return State::where('country_id', $country)
            ->get();
    }

    public function city($state)
    {
        return City::where('state_id', $state)
            ->get();
    }
}
