<?php

namespace GGPHP\Ship;

use Illuminate\Support\Facades\Facade;

/**
 * @see \GGPHP\Ship
 */
class ShipFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Ship';
    }
}
