<?php

namespace App;

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
}
