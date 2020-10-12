<?php

namespace GGPHP\Workflow\Http\Controllers;

use GGPHP\Core\Http\Controllers\Controller;
use GGPHP\Workflow\Http\Requests\WorkflowUpdateRequest;
use GGPHP\Workflow\Http\Requests\WorkflowCreateRequest;
use GGPHP\Workflow\Http\Requests\WorkflowTransitionCreateRequest;
use GGPHP\Workflow\Models\Workflow;
use GGPHP\Workflow\Repositories\Contracts\WorkflowTransitionRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class WorkflowTransitionController extends Controller
{
    /**
     * @var $workflowTransitionRepository
     */
    protected $workflowTransitionRepository;
    
    /**
     * WorkflowTransitionController constructor.
     * @param WorkflowTransitionRepository $workflowTransitionRepository
     */
    public function __construct(WorkflowTransitionRepository $workflowTransitionRepository){
        $this->workflowTransitionRepository = $workflowTransitionRepository;
    }

    /**
     *
     * @param UserCreateRequest $request
     *
     * @return Response
     */
    public function store(WorkflowTransitionCreateRequest $request, Workflow $workflow)
    {
        $workflow = $this->workflowTransitionRepository->addWorkflowTransitions($workflow, $request->all());

        return $this->success($workflow, trans('lang::messages.common.createSuccess'), ['code' => Response::HTTP_CREATED]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  string $id
     *
     * @return Response
     */
    public function update(WorkflowUpdateRequest $request, $id)
    {
        $Workflow = $this->workflowTransitionRepository->update($request->all(), $id);

        return $this->success($Workflow, trans('lang::messages.common.updateSuccess'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->workflowTransitionRepository->delete($id);
        return response()->json([], 204);
    }
}
