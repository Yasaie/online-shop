<?php

namespace App\Http\Controllers\Admin;

use App\Tracker;
use Yasaie\Cruder\Crud;

class ReportController extends BaseController
{
    public function index()
    {
        # table headers
        $heads = [
            [
                'name' => 'id',
            ],
            [
                'name' => 'method',
                'visible' => 1
            ],
            [
                'name' => 'path',
                'visible' => 1
            ],
            [
                'name' => 'ip_address',
                'visible' => 1
            ],
            [
                'name' => 'created_at',
                'visible' => 1
            ]
        ];

        $items = Tracker::all();
        view()->share([
            'title' => 'بازدیدها',
        ]);

        return Crud::index($items, $heads, 'created_at_desc', $this->perPage);
    }
}
