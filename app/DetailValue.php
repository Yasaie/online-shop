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
