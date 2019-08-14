<?php
/**
 * @package     Helper
 * @author      Payam Yasaie <payam@yasaie.ir>
 * @copyright   2019-06-18
 */

use Illuminate\Database\Eloquent\Model;

if (!function_exists('gdate')) {
    function gdate($date)
    {
        return app()->getLocale() == 'fa'
            ? new \Hekmatinasser\Verta\Verta($date)
            : new \Carbon\Carbon($date);
    }
}

if (!function_exists('setting')) {
    function setting($key, $object = true)
    {
        $keys = explode('.', $key);
        $settings = \Cache::rememberForever('app.settings', function () {
            return \App\Setting::get();
        });
        $section = array_shift($keys);
        $setting = $settings->where('section', $section);

        if ($keys) {
            $setting = $setting->filter(function ($item) use ($keys) {
                return strpos($item->key, implode('.', $keys)) !== false;
            });
        }

        if ($object) {
            $setting = $setting->pluck('data', 'key');
        }

        return $setting->count() > 1 ? $setting : $setting->first();
    }
}

if (!function_exists('userPrice')) {
    function userPrice($price, $ratio)
    {
        $base_price = $price * $ratio;
        $currency = config('app.current_currency');

        return number_format($base_price / $currency->ratio, $currency->places);
    }
}

if (!function_exists('getPercentage')) {
    function getPercentage($previous, $current)
    {
        $previous = filter_var($previous, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $current = filter_var($current, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

        return $previous ? floor(100 - (($current * 100) / $previous)) : 0;
    }
}
//
//if (!function_exists('filterItems')) {
//    function filterItems($object, $contexts, $searchable, $search)
//    {
//        $dictionary = \Yasaie\Dictionary\Dictionary::whereIn('context_type', $contexts)
//            ->where('value', 'like', '%' . $search . '%')
//            ->get()
//            ->pluck('full_path', 'id');
//
//        return $object->filter(function ($a) use ($dictionary, $contexts, $searchable) {
//            $found = [];
//            foreach ($contexts as $key => $context) {
//                $found[] = $dictionary->search($contexts[$key] . dotObject($a, $searchable[$key])) == true;
//            }
//            return in_array(1, $found);
//        });
//    }
//}

if (!function_exists('a2o')) {
    function a2o($array)
    {
        return collect(json_decode(json_encode($array, 1)));
    }
}

if (!function_exists('isRTL')) {
    function isRTL($bool = true)
    {
        $rtl = ['fa', 'ar'];
        return in_array(app()->getLocale(), $rtl)
            ? ($bool ? 1 : 'rtl')
            : ($bool ? 0 : 'ltr');

    }
}

if (!function_exists('catsProducts')) {
    function catsProducts($id, $get = false)
    {
        $products = \App\Product::select([
            'products.id',
            'products.created_at',
            'products.updated_at',
            'category_id',
            'path',
            'depth'
        ])
            ->join('categories', 'category_id', 'categories.id')
            ->where('categories.path', 'regexp', "(^|\/)$id($|\/)")
            ->with(['sellers.currency', 'media']);

        if ($get) {
            return $products->get();
        }

        return $products;
    }
}

function dot($object, $dots, $string = false)
{
    return \Yasaie\Support\Yalp::dot($object, $dots, $string);
}

function joinDictionary($item, $class)
{
    $instance = new $class;
    $locales = $instance->getLocales();
    $table = $instance->getTable();

    foreach ($locales as $locale) {
        $column = \Yasaie\Dictionary\Dictionary::select(["value as {$locale}", 'context_id'])
            ->where('language_id', app()->getLocale())
            ->where('context_type', $class)
            ->where('key', $locale);

        $item->joinSub($column, $locale, "{$locale}.context_id",  "{$table}.id");
    }

    return $item;
}