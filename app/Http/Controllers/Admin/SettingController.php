<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Yasaie\Cruder\Crud;

class SettingController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function global()
    {
        view()->share([
            'title' => 'تنظیمات عمومی',
        ]);
        $settings = Setting::all();
        $multilang = [];
        $gets = [
            'site.title',
            'footer.block1.title',
            'footer.block1.body',
            'footer.block2.title',
            'footer.block2.body',
        ];
        foreach ($gets as $get) {
            $parts = explode('.', $get, 2);
            $db = $settings->where('section', $parts[0])
                ->where('key', $parts[1])
                ->first();

            $multilang[] = [
                'name' => $get,
                'type' => $db->type,
                'get' => 'value',
                'value' => $db
            ];
        }

        return Crud::create([], $multilang);
    }
}
