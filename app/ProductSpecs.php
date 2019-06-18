<?php

namespace App;

use App\Usage\DictionaryTrait;
use Illuminate\Database\Eloquent\Model;

class ProductSpecs extends Model
{
    use DictionaryTrait;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function specs()
    {
        return $this->belongsTo(Specs::class, 'spec_id');
    }
}
