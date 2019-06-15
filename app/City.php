<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\City
 *
 * @property int $id
 * @property int $state_id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\City whereStateId($value)
 * @mixin \Eloquent
 */
class City extends Model
{
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function country()
    {
        return State::find($this->state_id)->belongsTo(Country::class);
    }

}
