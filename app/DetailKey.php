<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yasaie\Dictionary\Traits\HasDictionary;

class DetailKey extends Model
{
    use HasDictionary;

    protected $dictionary = ['title'];

    public function detailCategory()
    {
        return $this->belongsTo(DetailCategory::class);
    }

}
