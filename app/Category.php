<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yasaie\Dictionary\Traits\HasDictionary;

/**
 * @author Payam Yasaie <payam@yasaie.ir>
 *
 * Class Category
 * @package App
 * @mixin \Eloquent
 * @mixin HasDictionary
 */
class Category extends Model
{
    use HasDictionary;

    protected $guarded = [];

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
