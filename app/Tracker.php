<?php

namespace App;

use Jenssegers\Agent\Agent;

/**
 * @author Payam Yasaie <payam@yasaie.ir>
 *
 * Class Tracker
 * @package App
 * @mixin \Eloquent
 */
class Tracker extends BaseModel
{
    protected $casts = [
        'parameters' => 'object',
    ];

    protected $appends = [
        'platform',
        'browser',
    ];

    public function agent()
    {
        $agent = new Agent();
        $agent->setUserAgent($this->agent);
        return $agent;
    }

    public function getPlatformAttribute()
    {
        $item = $this->agent()->platform();
        $version = $this->agent()->version($item);
        return "$item $version";
    }

    public function getBrowserAttribute()
    {
        $item = $this->agent()->browser();
        $version = $this->agent()->version($item);
        return "$item $version";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
