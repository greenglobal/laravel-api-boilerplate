<?php

namespace Kun391\Core;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Kun391\JsonApi
 */
class JsonApiFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'JsonApi';
    }
}
