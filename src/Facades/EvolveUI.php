<?php

namespace EvolveUI\EvolveUI\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \EvolveUI\EvolveUI\EvolveUI
 */
class EvolveUI extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \EvolveUI\EvolveUI\EvolveUI::class;
    }
}
