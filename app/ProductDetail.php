<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    public function detailKey()
    {
        return $this->belongsTo(DetailKey::class);
    }

    public function detailValue()
    {
        return $this->belongsTo(DetailValue::class);
    }
}
