<?php

namespace App;

class Comment extends BaseModel
{
    protected $guarded = [];

    protected $appends = ['is_changed'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getIsChangedAttribute()
    {
        return $this->updated_at != $this->created_at;
    }
}