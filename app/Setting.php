<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yasaie\Dictionary\Traits\HasDictionary;

class Setting extends Model
{
    use HasDictionary;

    protected $appends = ['data'];

    protected $locales = ['value'];

    public function getDataAttribute()
    {
        return self::getAttribute('value') ?: self::locale('value');
    }
}
