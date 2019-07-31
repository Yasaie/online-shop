<?php

namespace App\Http\Controllers\Front;

class HomeController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $carousels = setting('front.carousel', 0)->getMedia('carousel');
        $sliders = setting('front.slider');

        return view('front.home.index')
            ->with(compact('carousels', 'sliders'));
    }
}
