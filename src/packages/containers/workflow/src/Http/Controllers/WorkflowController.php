<?php

namespace GGPHP\Workflow\Http\Controllers;

use GGPHP\Core\Http\Controllers\Controller;
use GGPHP\Workflow\Http\Requests\WorkflowUpdateRequest;
use GGPHP\Workflow\Http\Requests\WorkflowCreateRequest;
use GGPHP\Workflow\Http\Requests\WorkflowTransitionCreateRequest;
use GGPHP\Workflow\Repositories\Contracts\WorkflowRepository;
use GGPHP\Workflow\Models\Workflow;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WorkflowController extends Controller
{
    /**
     * @var $userRepository
     */
    protected $workflowRepository;

    /**
     * UserController constructor.
     * @param WorkflowRepository $workflowRepository
     */
    public function __construct(WorkflowRepository $workflowRepository){
        $this->workflowRepository = $workflowRepository;
    }

    /**
     *
     * @param UserCreateRequest $request
     *
     * @return Response
     */
    public function store(WorkflowCreateRequest $request)
    {
        $workflow = $request->all();
        $user = $this->workflowRepository->create($request->all());
        return $this->success($user, trans('lang::messages.common.createSuccess'), ['code' => Response::HTTP_CREATED]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index(Request $request)
    {
        $registry = app('workflow');
        $workflows = \GGPHP\Workflow\Models\Workflow::with(['places', 'transitions' => function ($q) {
            $q->with(['fromPlace', 'toPlace']);
        }])->get();
        // dd($workflow);
        // dd($workflow->places->pluck('slug')->toArray());
        // dd($workflow->transitions->toArray());
        foreach ($workflows as $workflow) {
            $registry->addFromArray($workflow->name, [
                'type' => $workflow->type, // or 'state_machine'
                'marking_store' => $workflow->marking_store,
                'supports' => $workflow->supports,
                'places' => $workflow->places->pluck('slug')->toArray(),
                'transitions' => $workflow->transitions->map(function ($transition) {
                    $parseTransition['name'] = $transition->slug;
                    $parseTransition['from'] = $transition->fromPlace->slug;
                    $parseTransition['to'] = $transition->toPlace->slug;

                    return $parseTransition;
                }),
            ]);
        }
        dd($registry);
        $Workflows = $this->workflowRepository->getAll($request->all());

        return $this->success($Workflows);
    }

    /**
     *
     * @param UserCreateRequest $request
     *
     * @return Response
     */
    public function addTransitions(WorkflowTransitionCreateRequest $request, Workflow $workflow)
    {
        $workflow = $this->workflowRepository->addTransitions($workflow, $request->all());

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
        $Workflow = $this->workflowRepository->update($request->all(), $id);

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
        $this->workflowRepository->delete($id);
        return response()->json([], 204);
    }
}
