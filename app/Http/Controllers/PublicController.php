<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Constraint;
use Intervention\Image\Image;
use Intervention\Image\ImageCache;

/**
 * @author Payam Yasaie <payam@yasaie.ir>
 *
 * Class PublicController
 * @package App\Http\Controllers
 */
class PublicController extends Controller
{
    public function lang($id)
    {
        return redirect('/')->with(session(['lang' => $id]));
    }

    public function image(Request $request, $image, $ext)
    {
        $scale = 50;
        $cache_time = (60 * 24 * 10); # 10 days
        $file_dir = 'C:\Users\yasaie\Desktop\Stock Photos\\';

        $validator = \Validator::make($request->all(), [
            'h' => 'required_if:c,1|int|min:' . $scale,
            'w' => 'required_if:c,1|int|min:' . $scale,
            'c' => 'bool'
        ]);

        if (!$validator->fails()) {
            $height = $request->h ? ((round($request->h / $scale)) * $scale) : 0;
            $width = $request->w ? ((round($request->w / $scale)) * $scale) : 0;
            $crop = $request->c ?: 0;

            $img = \Image::cache(function(ImageCache $img) use ($image, $ext, $height, $width, $crop, $file_dir) {
                $img->make($file_dir . $image .'.'. $ext);

                if ($crop) {
                    $img->fit($height, $width);
                } else {
                    if ($width and (! $height or $width < $height)) {
                        $img->widen($width, function (Constraint $constraint) {
                            $constraint->upsize();
                        });
                    } elseif ($height) {
                        $img->heighten($height, function (Constraint $constraint) {
                            $constraint->upsize();
                        });
                    }
                }

            }, $cache_time, true);

            return $img->response($ext);
        }
        return abort(404);
    }
}
