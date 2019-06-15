<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Country
 *
 * @property int $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\State[] $state
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Country whereName($value)
 * @mixin \Eloquent
 */
class Country extends Model
{

    public function state()
    {
        return $this->hasMany(State::class);
    }

    public function city()
    {
        return $this->hasManyThrough(City::class, State::class);
    }

}
