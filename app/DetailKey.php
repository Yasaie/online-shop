<?php

namespace App;

use App\Usage\DictionaryTrait;
use Illuminate\Database\Eloquent\Model;

class DetailKey extends Model
{
    use DictionaryTrait;

    public function detailCategory()
    {
        return $this->belongsTo(DetailCategory::class);
    }

}
