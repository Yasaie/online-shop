<?php
/**
 * @package     shop
 * @author      Payam Yasaie <payam@yasaie.ir>
 * @copyright   2019-06-22
 */

namespace App\Http\Controllers\Front;

use App\Category;
use App\Http\Controllers\Controller;
use App\Menu;
use Yasaie\Helper\Y;

class BaseController extends Controller
{
    protected $categories;

    public function __construct()
    {
        $this->categories = collect(\Cache::rememberForever('app.categories', function () {
            return Category::get();
        }));
        $menus = \Cache::rememberForever('app.menus', function () {
            return Y::buildTree(Menu::with('category')->get()->sortBy('sort'));
        });
        view()->share(compact('menus'));
    }
}