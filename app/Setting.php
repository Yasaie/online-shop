<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yasaie\Dictionary\Traits\HasDictionary;

/**
 * @author Payam Yasaie <payam@yasaie.ir>
 *
 * Class Setting
 * @package App
 * @mixin \Eloquent
 * @mixin HasDictionary
 */
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
