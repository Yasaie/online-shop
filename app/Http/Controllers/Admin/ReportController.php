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
                'hidden' => 1
            ],
            [
                'name' => 'user',
                'get' => 'user.full_name',
            ],
            [
                'name' => 'method',
            ],
            [
                'name' => 'path',
            ],
            [
                'name' => 'ip_address',
            ],
            [
                'name' => 'platform',
            ],
            [
                'name' => 'browser',
            ],
            [
                'name' => 'device',
                'get' => 'agent().device()',
            ],
            [
                'name' => 'robot',
                'get' => 'agent().robot()',
            ],
            [
                'name' => 'created_at',
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
