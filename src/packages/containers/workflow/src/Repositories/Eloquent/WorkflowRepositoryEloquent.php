<?php

namespace GGPHP\Workflow\Repositories\Eloquent;

use GGPHP\Workflow\Models\Workflow;
use GGPHP\Workflow\Repositories\Contracts\WorkflowRepository;
use GGPHP\Workflow\Presenters\WorkflowPresenter;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class WorkflowRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class WorkflowRepositoryEloquent extends BaseRepository implements WorkflowRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'user.full_name' => 'like',
        'user.rankPositionInformation.store_id',
        'user.rankPositionInformation.position_id',
        'user.rankPositionInformation.division_id',
        'user.rankPositionInformation.work_form_id',
        'user.rankPositionInformation.rank_id',
        'status',
    ];
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Workflow::class;
    }

    public function presenter()
    {
        return WorkflowPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function delete($id)
    {
        $model = $this->skipPresenter()->find($id);

        return parent::delete($id);
    }

    /**
     * Get all Magnetic Card
     * @param  array  $attributes attributes from request
     * @return object
     */
    public function getAll(array $attributes)
    {
        if (!empty($attributes['start_date']) && !empty($attributes['end_date'])) {
            $this->model = $this->model->where('created_at', '>=', $attributes['start_date'])->where('created_at', '<=', $attributes['end_date']);
        }

        if (!empty($attributes['limit'])) {
            $magneticCard = $this->paginate($attributes['limit']);
        } else {
            $magneticCard = $this->get();
        }

        return $magneticCard;
    }

    public function create(array $attributes)
    {
        $workflow = $this->model()::create($attributes);
        if (!empty($attributes['places'])) {
            $workflow->places()->createMany($attributes['places']);
        }

        return parent::find($workflow->id);
    }

    public function addTransitions($workflow, array $attributes)
    {
        if (!empty($attributes['transitions'])) {
            $workflow->transitions()->createMany($attributes['transitions']);
        }
        return parent::find($workflow->id);
    }
}
