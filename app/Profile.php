<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yasaie\Dictionary\Traits\HasDictionary;

class Profile extends Model
{
    use HasDictionary;

    protected $locales = ['title'];
}
