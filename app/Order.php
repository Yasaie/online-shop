<?php

namespace App;

/**
 * @author Payam Yasaie <payam@yasaie.ir>
 *
 * Class Order
 * @package App
 * @mixin \Eloquent
 */
class Order extends BaseModel
{
    protected $guarded = [];

    protected $appends = [
        'current_price',
        'current_price_no',
        'previous_price',
        'previous_price_no',
        'off_percent',
        'confirmation',
        'status_locale'
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
        $this->updatePrice(0);
    }

    public function setQuantityAttribute($value)
    {
        $this->attributes['quantity'] = $value;
        $this->updatePrice(0);
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

    public function getConfirmationAttribute()
    {
        $text = '';
        if ($this->confirmed !== null) {
            $text = $this->confirmed
                ? __('inc/cart.confirmed')
                : __('inc/cart.unconfirmed');
        }
        return $text;
    }

    public function getStatusLocaleAttribute()
    {
        return __('inc/cart.' . $this->status);
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

    public function updatePrice($save = true)
    {
        $seller = $this->seller;

        $this->attributes['price'] = $seller->current_price_no;
        $this->attributes['prev_price'] = $seller->previous_price_no;
        $this->attributes['currency_id'] = config('app.current_currency')->id;

        if ($save) $this->save();
    }
}