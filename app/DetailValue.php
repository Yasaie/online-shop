<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yasaie\Dictionary\Traits\HasDictionary;

class DetailValue extends Model
{
    use HasDictionary;

    protected $locales = ['title'];

    public function detailKey()
    {
        return $this->belongsTo(DetailKey::class);
    }

}
