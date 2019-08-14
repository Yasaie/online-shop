<?php

namespace App;

use Yasaie\Dictionary\Traits\HasDictionary;

/**
 * @mixin \Eloquent
 * @mixin HasDictionary
 */
class DetailValue extends BaseModel
{
    use HasDictionary;

    protected $guarded = [];

    protected $appends = ['key_value'];

    protected $locales = ['title'];

    public function detailKey()
    {
        return $this->belongsTo(DetailKey::class);
    }

    public function getKeyValueAttribute()
    {
        return "{$this->detailKey->title}: {$this->title}";
    }

}
