<?php

namespace GGPHP\Workflow\Transformers;

use GGPHP\Core\Transformers\BaseTransformer;
use GGPHP\Workflow\Transformers\WorkflowTransitionTransformer;
use GGPHP\Workflow\Transformers\WorkflowPlaceTransformer;
use GGPHP\Workflow\Models\Workflow;

/**
 * Class WorkflowTransformer.
 *
 * @package namespace GGPHP\Workflow\Transformers;
 */
class WorkflowTransformer extends BaseTransformer
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = ['transitions', 'places'];
    /**
     * Include approvals
     * @param Workflow $workflow
     * @return \League\Fractal\Resource\Collection
     */
    public function includeTransitions(Workflow $workflow)
    {
        if ($workflow->transitions->isEmpty()) {
            return;
        }

        return $this->collection($workflow->transitions, new WorkflowTransitionTransformer, 'Transition');
    }

    /**
     * Include approvals
     * @param Workflow $workflow
     * @return \League\Fractal\Resource\Collection
     */
    public function includePlaces(Workflow $workflow)
    {
        if ($workflow->places->isEmpty()) {
            return;
        }

        return $this->collection($workflow->places, new WorkflowPlaceTransformer, 'Place');
    }
}
