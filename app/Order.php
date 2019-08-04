<?php

namespace App;


class Order extends BaseModel
{
    protected $guarded = [];

    protected $appends = [
        'current_price',
        'current_price_no',
        'previous_price',
        'previous_price_no',
        'off_percent'
    ];

    /**
     * @package getQuantityAttribute
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @throws \Exception
     */
    public function getQuantityAttribute()
    {
        $max = $this->seller->amount;
        $quantity = $this->attributes['quantity'];

        if ($quantity > $max) {
            $this->attributes['quantity'] = $max;
            $this->save();
        }

        return $this->attributes['quantity'];
    }

    public function setSellerIdAttribute($value)
    {
        $this->attributes['seller_id'] = $value;
        $seller = $this->seller;
        $this->attributes['price'] = $seller->current_price_no;
        $this->attributes['prev_price'] = $seller->previous_price_no;
        $this->attributes['currency_id'] = config('app.current_currency')->id;
    }

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

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function product()
    {
        return $this->seller ? $this->seller->product() : null;
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}