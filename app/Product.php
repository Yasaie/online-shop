<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Product
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property string|null $modified_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereModifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryTrait dictionary()
 * @mixin \Eloquent
 */
class Product extends Model
{
    use DictionaryTrait;
}
