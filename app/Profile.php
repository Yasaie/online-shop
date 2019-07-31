<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;
use Yasaie\Dictionary\Traits\HasDictionary;

class Profile extends Model
{
    use HasDictionary;

    protected $locales = ['title'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
