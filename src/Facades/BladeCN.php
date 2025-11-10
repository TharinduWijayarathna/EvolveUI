<?php

namespace BladeCN\BladeCN\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \BladeCN\BladeCN\BladeCN
 */
class BladeCN extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \BladeCN\BladeCN\BladeCN::class;
    }
}
