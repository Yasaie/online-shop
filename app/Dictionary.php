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

    public function context()
    {
        return $this->morphTo();
    }
}
