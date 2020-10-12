<?php

namespace GGPHP\Workflow;

use GGPHP\Core\RouteRegistrar as CoreRegistrar;

class RouteRegistrar extends CoreRegistrar
{
    /**
     * The namespace implementation.
     */
    protected static $namespace = '\GGPHP\Workflow\Http\Controllers';

    /**
     * Register routes for bread.
     *
     * @return void
     */
    public function all()
    {
        $this->forBread();
    }

    /**
     * Register the routes needed for managing clients.
     *
     * @return void
     */
    public function forBread()
    {
        $this->router->group(['middleware' => []], function ($router) {
            $router->get('/workflows', [
                'uses' => 'WorkflowController@index',
                'as' => 'workflows.bread.index',
            ])->middleware();

            $router->post('/workflows', [
                'uses' => 'WorkflowController@store',
                'as' => 'workflows.bread.create',
            ])->middleware();

            $router->patch('/workflows/{workflow}', [
                'uses' => 'WorkflowController@update',
                'as' => 'workflows.update',
            ])->middleware();

            $router->post('/workflows/{workflow}/transitions', [
                'uses' => 'WorkflowController@addTransitions',
                'as' => 'workflows.bread.transition',
            ])->middleware();

            $router->delete('/workflows/{fingerpint}', [
                'uses' => 'WorkflowController@destroy',
                'as' => 'workflows.destroy',
            ])->middleware();
        });
    }
}
