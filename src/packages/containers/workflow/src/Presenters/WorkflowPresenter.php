<?php

namespace GGPHP\Workflow\Presenters;

use GGPHP\Workflow\Transformers\WorkflowTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class WorkflowPresenter.
 *
 * @package namespace GGPHP\Workflow\Presenters;
 */
class WorkflowPresenter extends FractalPresenter
{
    /**
     * @var string
     */
    protected $resourceKeyItem = 'Workflow';

    /**
     * @var string
     */
    protected $resourceKeyCollection = 'Workflow';

    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new WorkflowTransformer();
    }
}
