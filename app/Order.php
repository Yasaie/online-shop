<?php

namespace App;


class Order extends BaseModel
{
    protected $guarded = [];

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

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}