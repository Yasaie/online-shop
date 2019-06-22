<?php
/**
 * @package     shop
 * @author      Payam Yasaie <payam@yasaie.ir>
 * @copyright   2019-06-22
 */

namespace App\Http\Controllers\Front;

use App\Category;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected $categories;

    public function __construct()
    {
        $this->categories = collect(\Cache::rememberForever('app.categories', function () {
            return Category::orderBy('sort')->get();
        }));
        $categories = \Cache::rememberForever(md5($this->categories->toJson()), function () {
            return buildTree($this->categories);
        });
        view()->share('categories', $categories);
    }
}