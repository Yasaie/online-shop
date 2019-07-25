<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seller extends Model
{
    use SoftDeletes;

    protected $appends = [
        'current_price',
        'previous_price',
        'off_percent'
    ];

    protected $guarded = [];

    public function getCurrentPriceAttribute()
    {
        return userPrice($this->price, $this->currency->ratio);
    }

    public function getPreviousPriceAttribute()
    {
        return userPrice($this->prev_price, $this->currency->ratio);
    }

    public function getOffPercentAttribute()
    {
        $previous = filter_var($this->previous_price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $current = filter_var($this->current_price, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

        return $previous ? floor((100 - (($current * 100) / $previous))) : 0;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function sellerService()
    {
        return $this->belongsTo(SellerService::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
