<?php

namespace GGPHP\Workflow\Providers;

use Illuminate\Support\ServiceProvider;
use GGPHP\Workflow\Repositories\Contracts\WorkflowRepository;
use GGPHP\Workflow\Repositories\Eloquent\WorkflowRepositoryEloquent;
use GGPHP\Workflow\Repositories\Contracts\WorkflowTransitionRepository;
use GGPHP\Workflow\Repositories\Eloquent\WorkflowTransitionRepositoryEloquent;

class WorkflowProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        // $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->publishes([
            __DIR__.'/../../config/workflow.php' => config_path('workflow.php'),
            __DIR__.'/../../config/workflow_registry.php' => config_path('workflow_registry.php')
        ]);
        $this->mergeConfigFrom(__DIR__.'/../../config/workflow.php', 'workflow');
        $this->mergeConfigFrom(__DIR__.'/../../config/workflow_registry.php', 'workflow_registry');

        // Registering package commands.
        // $this->commands([]);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        // $this->app->register('GGPHP\Workflows\Providers\WorkflowProvider');
        // Register the main class to use with the facade
        $this->app->bind(WorkflowRepository::class, WorkflowRepositoryEloquent::class);
        $this->app->bind(WorkflowTransitionRepository::class, WorkflowTransitionRepositoryEloquent::class);
    }
}
