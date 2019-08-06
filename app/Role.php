<?php

namespace App;

class Role extends \Spatie\Permission\Models\Role
{
    public function getLocale()
    {
        $locale_name = 'model.' . $this->name;
        return __($locale_name) == $locale_name
            ? $this->name
            : __($locale_name);
    }
}
