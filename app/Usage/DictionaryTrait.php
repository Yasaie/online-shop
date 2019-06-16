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
    public function locale($name)
    {
        $key = implode('.', [
            app()->getLocale(),
            $this->table,
            $this->id,
            $name
        ]);

        $result = \Cache::rememberForever($key, function() use ($name) {
            return $this->hasOne(Dictionary::class, 'context_id')
                ->where([
                    ['language_id', app()->getLocale()],
                    ['table_name', $this->table],
                    ['key', $name]
                ])->value('value');
        });

        return $result;
    }

    public function dictionary()
    {
        $this->hasMany(Dictionary::class, 'context_id');
    }
}