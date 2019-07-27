<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\MediaLibrary\Models\Media;

class MediaController extends Controller
{

    /**
     * @package upload
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     */
    public function upload()
    {
        return \Auth::user()->addMediaFromRequest('file')
            ->toMediaCollection('draft')->id;
    }

    /**
     * @package unlink
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param null $id
     *
     * @return int
     */
    public function unlink($id = null)
    {
        if ($id)
            return Media::find($id)->delete() ? 1 : 0;
        return 0;
    }
}
