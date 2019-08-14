<?php

namespace App\Http\Controllers\Api;

use App\Product;
use App\Rate;
use App\Seller;
use App\Tracker;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yasaie\Dictionary\Dictionary;

/**
 * Class    ProductController
 *
 * @author  Payam Yasaie <payam@yasaie.ir>
 * @since   2019-08-15
 *
 * @package App\Http\Controllers\Api
 */
class ProductController extends Controller
{
    /**
     * @author  Payam Yasaie <payam@yasaie.ir>
     * @since   2019-08-15
     *
     * @param Request $request
     *
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function index(Request $request)
    {
        $this->validate($request, [
            'category' => ['required', 'numeric', 'exists:categories,id']
        ]);

        $rates = Rate::groupBy('product_id')
            ->select(['product_id', \DB::raw('AVG(rate) AS rate')]);
        $visitors = Tracker::where('route', 'product')
            ->groupBy('param1')
            ->select(['param1', \DB::raw('count(DISTINCT ip_address) AS visitor')]);

        $min_price = Seller::select([
            'product_id',
            \DB::raw('MIN(price * ratio) AS price'),
        ])
            ->join('currencies', 'currency_id', 'currencies.id')
            ->groupBy('product_id');

        $sellers = Seller::select([
            'product_id',
            \DB::raw('price * ratio AS price'),
            \DB::raw('IF(prev_price, FLOOR(100 - ((price * 100) / prev_price)), null) AS off_percent'),
        ])
            ->whereRaw('(product_id, price * ratio) IN (' . $min_price->toSql() . ')')
            ->join('currencies', 'currency_id', 'currencies.id');

        $title = Dictionary::where('language_id', app()->getLocale())
            ->where('context_type', Product::class)
            ->where('key', 'title');

        $products = Product::select([
            'products.id',
            'products.created_at',
            'products.updated_at',
            'category_id',
            'path',
            'depth',
            \DB::raw('title.value AS title'),
            'rate',
            'visitor',
            'price',
            'off_percent'
        ])
            ->join('categories', 'categories.id', 'products.category_id')
            ->joinSub($title, 'title', 'title.context_id', 'products.id')
            ->leftJoinSub($rates, 'rates', 'rates.product_id', 'products.id')
            ->leftJoinSub($visitors, 'trackers', 'param1', 'products.id')
            ->leftJoinSub($sellers, 'sellers', 'sellers.product_id', 'products.id')
            ->where('categories.path', 'regexp', "(^|\/){$request->category}($|\/)")
            ->orderBy('visitor', 'desc')
            ->get();

//        dd($products->get());


        $products = $products->map(function ($p) {
            $seller = $p->sellers
                ->where('amount', '>', 0)
                ->sortBy('current_price', SORT_NATURAL)
                ->first();

            $gets = array_merge($p->only([
                'id', 'title', 'off_percent'
            ]), [
                'price' => $seller ? $seller->current_price : null,
                'prev_price' => $seller ? $seller->previous_price : null,
                'image' => $p->firstThumb(),
                'url' => route('product', $p->only('id', 'slug')),
                'created_at' => $p->created_at->__toString(),
                'updated_at' => $p->updated_at->__toString()
            ]);

            return $gets;
        });

        return $products;
    }
}
