<?php

namespace App\Http\Controllers\Admin;

use Yasaie\Cruder\Crud;
use Yasaie\Tracker\Model\Tracker;

/**
 * Class    ReportController
 *
 * @author  Payam Yasaie <payam@yasaie.ir>
 * @since   2019-08-19
 *
 * @package App\Http\Controllers\Admin
 */
class ReportController extends BaseController
{
    /**
     * @author  Payam Yasaie <payam@yasaie.ir>
     * @since   2019-08-19
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        # table headers
        $heads = [
            [
                'name' => 'id',
                'hidden' => 1,
                'sortable' => true
            ],
            [
                'name' => 'user',
                'searchable' => "concat(users.first_name, ' ', users.last_name)",
                'clickable' => true,
            ],
            [
                'name' => 'method',
                'searchable' => 'method',
                'clickable' => true,
            ],
            [
                'name' => 'path',
                'searchable' => 'path',
                'clickable' => true,
            ],
            [
                'name' => 'ip_address',
                'searchable' => 'ip_address',
                'clickable' => true,
            ],
            [
                'name' => 'platform',
                'searchable' => 'platform',
                'clickable' => true,
            ],
            [
                'name' => 'browser',
                'searchable' => 'browser',
                'clickable' => true,
            ],
            [
                'name' => 'device',
                'searchable' => 'device',
                'clickable' => true,
            ],
            [
                'name' => 'robot',
                'searchable' => 'robot',
                'clickable' => true,
            ],
            [
                'name' => 'created_at',
                'searchable' => 'trackers.created_at',
            ]
        ];

        $items = Tracker::select([
            'trackers.*',
            \DB::raw("concat(users.first_name, ' ', users.last_name) as user"),
        ])->leftJoin('users', 'users.id', 'trackers.user_id');

        view()->share([
            'title' => 'بازدیدها',
        ]);

        return Crud::all($items, $heads, $this->perPage, 'created_at_desc');
    }
}
