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
    protected $guarded = [];

    protected $appends = ['status_id'];

    public $status_list = [
        'cart',
        'profile',
        'factor',
        'pay',
        'fail',
        'success',
        'checking',
        'ready',
        'sending',
        'received'
    ];

    public function getStatusIdAttribute()
    {
        $status = array_flip($this->status_list);
        return $status[$this->status] + 1;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
