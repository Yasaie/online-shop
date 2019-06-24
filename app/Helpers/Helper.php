<?php
/**
 * @package     Helper
 * @author      Payam Yasaie <payam@yasaie.ir>
 * @copyright   2019-06-18
 */

if (! function_exists('gdate')) {
    function gdate($date)
    {
        return app()->getLocale() == 'fa' ? new \Hekmatinasser\Verta\Verta($date) : new \Carbon\Carbon($date);
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