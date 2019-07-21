<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yasaie\Dictionary\Traits\HasDictionary;

class DetailKey extends Model
{
    use HasDictionary;

    protected $locales = ['title'];

    public function detailCategory()
    {
        return $this->belongsTo(DetailCategory::class);
    }

    public function detailValues()
    {
        return $this->hasMany(DetailValue::class);
    }

}
