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

if (! function_exists('buildTree')) {
    function buildTree($elements, $parentId = 0)
    {
        $branch = array();

        foreach ($elements as $element) {
            if ($element->parent_id == $parentId) {
                $children = buildTree($elements, $element->id);
                if ($children) {
                    $element->children = $children;
                }
                $branch[] = $element;
            }
        }

        return $branch;
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

if (! function_exists('getDots')) {
    /**
     * Get last child of object/array by Dots
     * Example: dotObject([1 => ['name' => 'yasaie']], '1.name')
     *          == 'yasaie'
     *
     * @package     dotObject
     * @copyright   2019-07-04
     * @author      Payam Yasaie
     * @link        https://www.yasaie.ir
     *
     * @param object $object
     * @param string $dots
     *
     * @return mixed
     */
    function dotObject($object, $dots)
    {
        # extract given dotted string to array
        $extract = explode('.', $dots);

        # check if current is function
        if (strpos($extract[0], '()')) {
            $extract[0] = str_replace('()', '', $extract[0]);
            $item = $object->{$extract[0]}();
        } else {
            # check if current index is array or object
            $item = isset($object[$extract[0]])
                ? $object[$extract[0]] : $object->{$extract[0]};
        }

        # check if still has child
        if (count($extract) > 1) {
            # remove first index of object for pass to function again
            $slice = implode('.', array_slice($extract, 1));
            return dotObject($item, $slice);
        }

        # finaly return last child
        return $item;
    }
}

if (! function_exists('filterItems')) {
    function filterItems($object, $contexts, $searchable, $search)
    {
        $dictionary = App\Dictionary::whereIn('context_type', $contexts)
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

if (!function_exists('flattenItems')) {
    function flattenItems($items, $names, $search)
    {
        $output = [];
        foreach ($items as $item) {
            $output[$item->id] = new stdClass();
            $found = false;
            foreach ($names as $name) {
                # if get index is not set default is name
                isset($name['get'])
                    or $name['get'] = $name['name'];

                # get item value recurusive
                $value = dotObject($item, $name['get']);
                $output[$item->id]->{$name['name']} = $value;

                # check if current item is searchable and change
                # found flag if search string found in item
                if (isset($name['visible'])
                    and $name['visible']
                    and preg_match("/$search/i", $value)
                ) {
                    $found = true;
                }
            }

            # unset item if no result found in search
            if (! $found) unset($output[$item->id]);
        }

        return collect($output);
    }
}

if (!function_exists('a2o')) {
    function a2o($array)
    {
        return collect(json_decode(json_encode($array, 1)));
    }
}

if (!function_exists('paginate')) {
    function paginate(&$items, $current, $perPage)
    {
        $items = $items instanceof \Illuminate\Support\Collection ? $items : collect($items);
        $page = new stdClass();
        $page->current = $current;
        $page->perPage = $perPage;
        $page->items_count = count($items);
        $page->count = (int)ceil($page->items_count / $page->perPage);

        $items = $items->forPage($page->current, $page->perPage);
        return $page;
    }
}