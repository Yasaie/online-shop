<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @author Payam Yasaie <payam@yasaie.ir>
 *
 * Class Tracker
 * @package App
 * @mixin \Eloquent
 */
class Tracker extends Model
{
    protected $casts = [
        'parameters' => 'object',
    ];
}
