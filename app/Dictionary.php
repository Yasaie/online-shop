<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Dictionary
 *
 * @mixin \Eloquent
 */
class Dictionary extends Model
{
    public $timestamps = false;
    protected $appends = ['full_path'];

    public function context()
    {
        return $this->morphTo();
    }

    public function getFullPathAttribute()
    {
        return "{$this->context_type}{$this->context_id}";
    }
}
