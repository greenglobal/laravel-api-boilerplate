<?php

namespace GGPHP\Workflow\Models;

use GGPHP\Core\Models\CoreModel;

class Place extends CoreModel
{
    const TYPE_APPROVE = 'APPROVE';
    const TYPE_DECLINE = 'DECLINE';
    const TYPE_CANCEL = 'CANCEL';
    const TYPE_PENDING = 'PENDING';
    const TYPE_AUTOMATIC_APPROVE = 'AUTOMATIC_APPROVE';

    protected $table = 'workflow_places';
    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name", "meta_data", "slug",
    ];

    protected $casts   = [
        "meta_data" => "json",
    ];
}
