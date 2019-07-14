<?php
/**
 * @package     Helper
 * @author      Payam Yasaie <payam@yasaie.ir>
 * @copyright   2019-06-18
 */

if (! function_exists('gdate')) {
    function gdate($date)
    {
        return app()->getLocale() == 'fa'
            ? new \Hekmatinasser\Verta\Verta($date)
            : new \Carbon\Carbon($date);
    }
}

if (! function_exists('setting')) {
    function setting($key)
    {
        $keys = explode('.', $key, 2);
        $settings = \Cache::rememberForever('app.settings', function () {
            return \App\Setting::get();
        });
        $setting = $settings->where('section', $keys[0])
            ->where('key', $keys[1])
            ->first();
        return $setting ? $setting->data : null;
    }
}

if (! function_exists('userPrice')) {
    function userPrice($price, $ratio)
    {
        $base_price = $price * $ratio;
        $currency = \Config::get('app.current_currency');

        return number_format($base_price / $currency->ratio, $currency->places);
    }
}

if (! function_exists('getPercentage')) {
    function getPercentage($previous, $current)
    {
        $previous = filter_var($previous, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $current = filter_var($current, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

        return floor((100 - (($current * 100) / $previous)));
    }
}

if (! function_exists('filterItems')) {
    function filterItems($object, $contexts, $searchable, $search)
    {
        $dictionary = \Yasaie\Dictionary\Dictionary::whereIn('context_type', $contexts)
            ->where('value', 'like', '%' . $search . '%')
            ->get()
            ->pluck('full_path', 'id');

        return $object->filter(function ($a) use ($dictionary, $contexts, $searchable) {
            $found = [];
            foreach ($contexts as $key => $context) {
                $found[] = $dictionary->search($contexts[$key] . dotObject($a, $searchable[$key])) == true;
            }
            return in_array(1, $found);
        });
    }
}

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
            ? ($bool ? true : 'rtl')
            : ($bool ? false : 'ltr');

    }
}