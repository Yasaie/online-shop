<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\State
 *
 * @property int $id
 * @property int $country_id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\State newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\State newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\State query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\State whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\State whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\State whereName($value)
 * @mixin \Eloquent
 */
class State extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->hasMany(City::class);
    }
}
