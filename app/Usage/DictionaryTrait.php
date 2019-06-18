<?php
/**
 * @package     shop
 * @author      Payam Yasaie <payam@yasaie.ir>
 * @copyright   2019-06-15
 */

namespace App\Usage;

use App\Dictionary;

/**
 * App\Product
 *
 * @mixin \Eloquent
 */
trait DictionaryTrait
{
    protected function getTranslate($name, $lang)
    {
        $req = [
            $lang,
            $this->table,
            $this->id,
            $name
        ];
        $key = implode('.', $req);

        return \Cache::rememberForever($key, function() use ($req, $lang) {
            return $this->dictionary()->where([
                ['language_id', $req[0]],
                ['key', $req[3]]
            ])->value('value');
        });
    }

    public function locale($name)
    {
        return $this->getTranslate($name, \Config::get('app.locale'))
            ?: $this->getTranslate($name, \Config::get('app.fallback_locale'));
    }

    public function dictionary()
    {
        return $this->hasMany(Dictionary::class, 'context_id')
            ->where('table_name', $this->table);
    }
}