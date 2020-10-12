<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkflowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workflows', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->json('supports');
            $table->json('marking_store');
            $table->json('definity')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
        });
        Schema::create('workflow_places', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('workflow_id');
            $table->string('name');
            $table->string('slug');
            $table->json('meta_data')->nullable();
            $table->timestamps();
            $table->foreign('workflow_id')
                ->references('id')
                ->on('workflows')
                ->onDelete('cascade');
        });
        Schema::create('workflow_transitions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('workflow_id');
            $table->json('meta_data')->nullable();
            $table->string('slug');
            $table->unsignedInteger('from');
            $table->unsignedInteger('to');
            $table->string('name');
            $table->timestamps();
            $table->foreign('workflow_id')
                ->references('id')
                ->on('workflows')
                ->onDelete('cascade');
            $table->foreign('from')
                ->references('id')
                ->on('workflow_places')
                ->onDelete('cascade');
            $table->foreign('to')
                ->references('id')
                ->on('workflow_places')
                ->onDelete('cascade');
        });
        Schema::create('transition_roles', function (Blueprint $table) {
            $table->unsignedInteger('transition_id');
            $table->unsignedInteger('role_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transition_roles');
        Schema::dropIfExists('workflow_transitions');
        Schema::dropIfExists('workflow_places');
        Schema::dropIfExists('workflows');
    }
}
