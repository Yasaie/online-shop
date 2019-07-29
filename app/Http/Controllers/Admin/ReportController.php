<?php

namespace App\Http\Controllers\Admin;

use App\Tracker;
use Jenssegers\Agent\Agent;
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
                'name' => 'user',
                'get' => 'user.full_name',
                'visible' => 1
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
                'name' => 'platform',
                'visible' => 1
            ],
            [
                'name' => 'browser',
                'visible' => 1
            ],
            [
                'name' => 'device',
                'get' => 'agent().device()',
                'visible' => 1
            ],
            [
                'name' => 'robot',
                'get' => 'agent().robot()',
                'visible' => 1
            ],
            [
                'name' => 'created_at',
                'visible' => 1
            ]
        ];

        $items = Tracker::all()
            ->load(['user']);
        view()->share([
            'title' => 'بازدیدها',
        ]);

        return Crud::index($items, $heads, 'created_at_desc', $this->perPage);
    }
}
