<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yasaie\Dictionary\Traits\HasDictionary;

class DetailValue extends Model
{
    use HasDictionary;

    protected $dictionary = ['title'];

}
