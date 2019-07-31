<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\GlobalSettingRequest;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Yasaie\Cruder\Crud;

class SettingController extends BaseController
{
    protected $global_gets = [
        'site.title',
        'footer.block1.title',
        'footer.block1.body',
        'footer.block2.title',
        'footer.block2.body',
        'footer.block3.title',
        'footer.block3.body',
        'footer.block4.title',
        'footer.block4.body',
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
            'route' => 'admin.setting.global'
        ]);

        $settings = Setting::all();
        $multilang = [];

        $break = null;
        foreach ($this->global_gets as $get) {
            $parts = explode('.', $get, 2);
            $db = $settings->where('section', $parts[0])
                ->where('key', $parts[1])
                ->first();

            $part2 = explode('.', $parts[1]);
            if (count($part2) > 1 and $break != $part2[0]) {
                $multilang[] = ['type' => 'break'];
                $break = $part2[0];
            }
            $multilang[] = [
                'name' => $get,
                'type' => $db->type,
                'get' => 'value',
                'value' => $db
            ];

        }

        return Crud::create([], $multilang, 'store');
    }

    /**
     * @package globalStore
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param GlobalSettingRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function storeGlobal(GlobalSettingRequest $request)
    {
        foreach ($this->global_gets as $get) {
            $parts = explode('.', $get, 2);
            $name = str_replace('.', '_', $get);

            Setting::where('section', $parts[0])
                ->where('key', $parts[1])
                ->first()
                ->updateLocale('value', $request->$name);
        }

        \Cache::delete('app.settings');

        return redirect()->route('admin.setting.global.index');
    }

    /**
     * @package slider
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function slider()
    {
        view()->share([
            'title' => 'تنظیمات اسلایدرها',
            'route' => 'admin.setting.slider'
        ]);

        $settings = Setting::where('section', 'front')
            ->where('key', 'like', 'slider%')
            ->get();

        $files = Setting::where('section', 'front')
            ->where('key', 'carousel')
            ->first();

        $inputs = [
            [
                'name' => 'carousel',
                'type' => 'file',
                'get' => 'carousel',
                'value' => $files,
                'options' => [
                    'max_files' => 5,
                ],
            ],
        ];

        $categories = Category::all();
        foreach ($settings as $slider) {
            $inputs[] = [
                'name' => $slider->key,
                'type' => $slider->type,
                'value' => $slider->data,
                'options' => [
                    'all' => $categories
                ]
            ];
        }

        return Crud::create($inputs, [], 'store');
    }

    /**
     * @package storeSlider
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeSlider(Request $request)
    {
        $item = Setting::where('section', 'front')
            ->where('key', 'carousel')
            ->first();

        Crud::upload($item, $request->carousel, 'carousel');

        return redirect()->route('admin.setting.slider.index');
    }

    /**
     * @package clearCache
     * @author  Payam Yasaie <payam@yasaie.ir>
     *
     */
    public function clearCache()
    {
        \Cache::clear();
        User::all()->each->clearMediaCollection('draft');
        return back();
    }
}
