<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yasaie\Dictionary\Traits\HasDictionary;

/**
 * @author Payam Yasaie <payam@yasaie.ir>
 *
 * Class DetailCategory
 * @package App
 * @mixin \Eloquent
 * @mixin HasDictionary
 */
class DetailCategory extends BaseModel
{
    use HasDictionary;

    protected $locales = ['title'];

    public function detailKey()
    {
        return $this->hasMany(DetailKey::class);
    }

}
