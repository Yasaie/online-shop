<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Yasaie\Dictionary\Traits\HasDictionary;

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
        $path = explode('/', $this->path);
        $cats = [];
        foreach ($path as $p) {
            $cats[$p] = $categories->find($p);
        }
        return $cats;
    }

    public function setDepth()
    {
        $path = $this->parent
            ? explode('/', $this->parent->path)
            : [];
        $path[] = $this->id;
        $this->depth = count($path);
        $this->path = implode('/', $path);
        $this->save();
    }

    public function panelLinks()
    {
        $route = route('admin.category.index');
        $link = "<a href='$route?column=parent&search=%1\$s'>%1\$s</a> / ";
        $string = '';
        foreach ($this->tree as $key => $path) {
            $string .= sprintf($link, $path->title);
        }
        return substr($string, 0, -2);
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
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
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('small')
            ->quality(80)
            ->fit(Manipulations::FIT_CROP, 350, 200)
            ->shouldBePerformedOn('image');
    }
}
