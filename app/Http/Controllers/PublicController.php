<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        $validator = \Validator::make($request->all(), [
            'h' => 'required|int|min:' . $scale,
            'w' => 'int|min:' . $scale,
            'c' => 'bool'
        ]);

        if (!$validator->fails()) {
            $height = (round($request->h / $scale)) * $scale;
            $width = $request->w ? ((round($request->w / $scale)) * $scale) : 0;
            $crop = $request->c ?: 0;

            $img = \Image::cache(function($img) use ($image, $ext, $height, $width, $crop) {
                $img->make('C:\Users\yasaie\Desktop\Stock Photos\\' . $image .'.'. $ext);

                if ($crop) {
                    $img->fit($height, $width);
                } else {
                    if ($width and $width < $height) {
                        $img->widen($width, function ($constraint) {
                            $constraint->upsize();
                        });
                    } else {
                        $img->heighten($height, function ($constraint) {
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
