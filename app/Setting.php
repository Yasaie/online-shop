<?php

namespace App;

use App\Usage\DictionaryTrait;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use DictionaryTrait;

    protected $appends = ['data'];

    public function getDataAttribute()
    {
        return self::getAttribute('value') ?: self::locale('value');
    }
}
