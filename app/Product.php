<?php

namespace App;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\File;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Yasaie\Dictionary\Traits\HasDictionary;

/**
 * App\Product
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property string|null $modified_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereModifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DictionaryTrait dictionary()
 * @mixin \Eloquent
 * @mixin HasDictionary
 * @mixin HasMediaTrait
 */
class Product extends BaseModel implements HasMedia
{
    use HasDictionary,
        HasMediaTrait;

    protected $guarded = [];

    protected $appends = ['product_rate'];

    protected $locales = ['title', 'description'];

    public function getProductRateAttribute()
    {
        return $this->rates->avg('rate');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function sellers()
    {
        return $this->hasMany(Seller::class);
    }

    public function details()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('images')
            ->acceptsFile(function (File $file) {
                $acceptable = [
                    'image/jpeg',
                    'image/png',
                    'image/gif',
                ];
                return in_array($file->mimeType, $acceptable);
            });
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('small')
            ->fit(Manipulations::FIT_MAX, 250, 250);
    }

}
