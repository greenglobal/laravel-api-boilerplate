<?php

namespace GGPHP\Workflow\Models;

use GGPHP\Core\Models\CoreModel;

class Workflow extends CoreModel
{
    /**
     * Declare the table name
     */
    protected $table = 'workflows';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name", "type", "marking_store", "supports", "meta_data"
    ];

    protected $casts   = [
        "marking_store" => "json",
        "supports" => "json",
        "meta_data" => "json"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function places()
    {
        return $this->hasMany("GGPHP\Workflow\Models\Place");
    }

    public function transitions()
    {
        return $this->hasMany("GGPHP\Workflow\Models\Transition");
    }
}
