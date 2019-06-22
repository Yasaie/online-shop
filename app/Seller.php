<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $appends = ['current_price'];

    public function getCurrentPriceAttribute()
    {
        $base_price = $this->price * $this->currency->ratio;
        $currency = \Config::get('app.current_currency');

        return number_format($base_price / $currency->ratio, $currency->places);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
