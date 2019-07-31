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
 * Class Setting
 * @package App
 * @mixin \Eloquent
 * @mixin HasDictionary
 * @mixin HasMediaTrait
 */
class Setting extends Model implements HasMedia
{
    use HasDictionary,
        HasMediaTrait;

    protected $appends = ['data'];

    protected $locales = ['value'];

    public function getDataAttribute()
    {
        return self::getAttribute('value') ?: self::locale('value');
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('carousel')
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
            ->quality(80)
            ->fit(Manipulations::FIT_CROP, 120, 120)
            ->shouldBePerformedOn('carousel');
    }
}
