<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yasaie\Dictionary\Traits\HasDictionary;

/**
 * @author Payam Yasaie <payam@yasaie.ir>
 *
 * Class Seller
 * @package App
 * @mixin HasDictionary
 * @mixin \Eloquent
 */
class Seller extends Model
{
    use HasDictionary;

    protected $appends = [
        'current_price',
        'current_price_no',
        'previous_price',
        'previous_price_no',
        'off_percent'
    ];

    protected $guarded = [];

    protected $locales = ['service'];

    public function getCurrentPriceAttribute()
    {
        return userPrice($this->price, $this->currency->ratio);
    }

    public function getPreviousPriceAttribute()
    {
        return userPrice($this->prev_price, $this->currency->ratio);
    }

    public function getCurrentPriceNoAttribute()
    {
        return str_replace(',', '', $this->current_price);
    }

    public function getPreviousPriceNoAttribute()
    {
        return str_replace(',', '', $this->previous_price);
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

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}
