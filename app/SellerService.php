<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yasaie\Dictionary\Traits\HasDictionary;

class SellerService extends Model
{
    use HasDictionary;

    protected $dictionary = ['title'];

}
