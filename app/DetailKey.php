<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yasaie\Dictionary\Traits\HasDictionary;

/**
 * @author Payam Yasaie <payam@yasaie.ir>
 *
 * Class DetailKey
 * @package App
 * @mixin \Eloquent
 * @mixin HasDictionary
 */
class DetailKey extends Model
{
    use HasDictionary;

    protected $guarded = [];

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
