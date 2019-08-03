<?php

namespace App;


class Order extends BaseModel
{
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
