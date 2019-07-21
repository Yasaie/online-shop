<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    public function detailKey()
    {
        return $this->detailValue ? $this->detailValue->detailKey() : null;
    }

    public function detailValue()
    {
        return $this->belongsTo(DetailValue::class);
    }
}
