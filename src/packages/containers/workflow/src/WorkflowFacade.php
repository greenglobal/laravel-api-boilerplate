<?php

namespace GGPHP\Workflow;

use Illuminate\Support\Facades\Facade;

/**
 * @see \GGPHP\Workflow\Skeleton\SkeletonClass
 */
class WorkflowFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Workflow';
    }
}
