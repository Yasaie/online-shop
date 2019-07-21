<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yasaie\Dictionary\Traits\HasDictionary;

class Category extends Model
{
    use HasDictionary;

    protected $locales = ['title'];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
