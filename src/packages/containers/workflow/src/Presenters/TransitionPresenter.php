<?php

namespace GGPHP\Workflow\Presenters;

use GGPHP\Workflow\Transformers\WorkflowTransitionTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class WorkflowPresenter.
 *
 * @package namespace GGPHP\Workflow\Presenters;
 */
class TransitionPresenter extends FractalPresenter
{
    /**
     * @var string
     */
    protected $resourceKeyItem = 'Transition';

    /**
     * @var string
     */
    protected $resourceKeyCollection = 'Transition';

    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new WorkflowTransitionTransformer();
    }
}
