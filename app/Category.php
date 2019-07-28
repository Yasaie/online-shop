<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
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
class Category extends Model implements HasMedia
{
    use HasDictionary,
        HasMediaTrait;

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

    public function registerMediaCollections()
    {
        $this->addMediaCollection('image')
            ->acceptsFile(function (File $file) {
                $acceptable = [
                    'image/jpeg',
                    'image/png',
                    'image/gif',
                ];
                return in_array($file->mimeType, $acceptable);
            })->singleFile();
        $this->addMediaConversion('image')
            ->fit(Manipulations::FIT_CROP, 250, 250);
    }
}
