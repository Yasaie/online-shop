<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $guarded = [];

    protected $appends = ['highlighted', 'key_value'];

    public function detailKey()
    {
        return $this->detailValue ? $this->detailValue->detailKey() : null;
    }

    public function detailValue()
    {
        return $this->belongsTo(DetailValue::class);
    }

    public function getHighlightedAttribute()
    {
        return $this->detailKey->highlighted;
    }

    public function getKeyValueAttribute()
    {
        return "{$this->detailKey->title}: {$this->detailValue->title}";
    }
}
