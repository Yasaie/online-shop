<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yasaie\Dictionary\Traits\HasDictionary;

/**
 * @mixin \Eloquent
 */
class DetailValue extends Model
{
    use HasDictionary;

    protected $locales = ['title'];

    protected $guarded = [];

    public function detailKey()
    {
        return $this->belongsTo(DetailKey::class);
    }

}
