<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GlobalSettingRequest;
use App\Setting;
use Yasaie\Cruder\Crud;

class SettingController extends BaseController
{
    public $route = 'admin.setting.global';

    protected $global_gets = [
        'site.title',
        'footer.block1.title',
        'footer.block1.body',
        'footer.block2.title',
        'footer.block2.body',
    ];

    /**
     * @package global
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function global()
    {
        view()->share([
            'title' => 'تنظیمات عمومی',
        ]);

        $settings = Setting::all();
        $multilang = [];

        foreach ($this->global_gets as $get) {
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

        return Crud::create([], $multilang, 'store');
    }

    public function globalStore(GlobalSettingRequest $request)
    {
        foreach ($this->global_gets as $get) {
            $parts = explode('.', $get, 2);
            $name = str_replace('.', '_', $get);

            Setting::where('section', $parts[0])
                ->where('key', $parts[1])
                ->first()
                ->updateLocale('value', $request->$name);
        }

        return redirect()->route('admin.setting.global.index');
    }

    /**
     * @package clearCache
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     */
    public function clearCache()
    {
        \Cache::clear();
        return back();
    }
}
