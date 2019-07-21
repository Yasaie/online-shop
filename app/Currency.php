<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yasaie\Dictionary\Traits\HasDictionary;

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
    use HasDictionary;

    protected $appends = ['title', 'default_language'];

    protected $locales = ['name'];

    public function getTitleAttribute()
    {
        return $this->symbol ?: $this->name;
    }

    public function getDefaultLanguageAttribute()
    {
        return $this->language_id
            ? config('global.langs.' . $this->language_id)->getNativeName()
            : null;
    }

    public function getRatioAttribute($value)
    {
        return (float)$value;
    }

    public function delete()
    {
        $parent = parent::delete();

        if ($parent) {
            $this->dictionary
        }
    }

}
