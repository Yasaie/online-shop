<?php

namespace App;

/**
 * @author Payam Yasaie <payam@yasaie.ir>
 *
 * Class Cart
 * @package App
 * @mixin \Eloquent
 */
class Cart extends BaseModel
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
