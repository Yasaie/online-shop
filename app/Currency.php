<?php

namespace App;

use App\Usage\DictionaryTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Currency
 *
 * @property int $id
 * @property string|null $language_id
 * @property float $ratio
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Currency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Currency query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Currency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Currency whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Currency whereRatio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryTrait dictionary()
 * @mixin \Eloquent
 */
class Currency extends Model
{
    use DictionaryTrait;

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
