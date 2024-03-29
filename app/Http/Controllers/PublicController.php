<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Language;
use Illuminate\Http\Request;
use Intervention\Image\Constraint;
use Intervention\Image\ImageCache;

/**
 * @author Payam Yasaie <payam@yasaie.ir>
 *
 * Class PublicController
 * @package App\Http\Controllers
 */
class PublicController extends Controller
{
    public function lang($lang)
    {
        return config('global.langs.' . $lang)
            ? back()->with(session(['lang' => $lang]))
            : back();
    }

    public function currency($key)
    {
        return Currency::where('key', $key)
            ? back()->with(session(['currency' => $key]))
            : back();
    }

    public function file($model, $model_id, $file_id, $file_area, $file_name)
    {
        $model = "\\App\\$model";
        $model = new $model;
        $file = $model->find($model_id)
            ->getMedia($file_area)[$file_id]
            ->getPath();

        return response()->file($file);
    }
//    public function image(Request $request, $image, $ext)
//    {
//        $scale = 50;
//        $cache_time = (60 * 24 * 10); # 10 days
//        $file_dir = 'C:\Users\yasaie\Desktop\Stock Photos\\';
//
//        $validator = \Validator::make($request->all(), [
//            'h' => 'required_if:c,1|int|min:' . $scale,
//            'w' => 'required_if:c,1|int|min:' . $scale,
//            'c' => 'bool'
//        ]);
//
//        if (!$validator->fails()) {
//            $height = $request->h ? ((round($request->h / $scale)) * $scale) : 0;
//            $width = $request->w ? ((round($request->w / $scale)) * $scale) : 0;
//            $crop = $request->c ?: 0;
//
//            $img = \Image::cache(function(ImageCache $img) use ($image, $ext, $height, $width, $crop, $file_dir) {
//                $img->make($file_dir . $image .'.'. $ext);
//
//                if ($crop) {
//                    $img->fit($height, $width);
//                } else {
//                    if ($width and (! $height or $width < $height)) {
//                        $img->widen($width, function (Constraint $constraint) {
//                            $constraint->upsize();
//                        });
//                    } elseif ($height) {
//                        $img->heighten($height, function (Constraint $constraint) {
//                            $constraint->upsize();
//                        });
//                    }
//                }
//
//            }, $cache_time, true);
//
//            return $img->response($ext);
//        }
//        return abort(404);
//    }
}
