<?php

namespace GGPHP\Workflow\Models;

use GGPHP\Core\Models\CoreModel;

class Transition extends CoreModel
{

    protected $table = 'workflow_transitions';
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name", "meta_data", "slug", "from", "to"
    ];

    protected $casts = [
        "meta_data" => "json",
    ];

    public function fromPlace()
    {
        return $this->belongsTo("GGPHP\Workflow\Models\Place", "from");
    }

    public function toPlace()
    {
        return $this->belongsTo("GGPHP\Workflow\Models\Place", "to");
    }
}
