<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class LaraTwilio extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'laratwilio';
    }
}
