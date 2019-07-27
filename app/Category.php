<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Yasaie\Dictionary\Traits\HasDictionary;
use Yasaie\Helper\Y;

/**
 * @author Payam Yasaie <payam@yasaie.ir>
 *
 * Class Category
 * @package App
 * @mixin \Eloquent
 * @mixin HasDictionary
 */
class Category extends Model
{
    use HasDictionary;

    protected $guarded = [];

    protected $appends = ['tree'];

    protected $locales = ['title'];

    public function getTreeAttribute()
    {
        $categories = \Cache::rememberForever('app.categories', function () {
            return Category::get();
        });
        $path = preg_split('/\//', $this->path, 0, PREG_SPLIT_NO_EMPTY);
        $names = [];
        foreach ($path as $p) {
            $names[$p] = $categories->find($p)->title;
        }
        return $names;
    }

    public function panelLinks()
    {
        $route = route('admin.category.index');
        $link = "<a href='$route?column=parent&search=%1\$s'>%1\$s</a> / ";
        $string = '';
        foreach ($this->tree as $key => $path) {
            $string .= sprintf($link, $path);
        }
        return substr($string, 0, -2);
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
