<?php

namespace GGPHP\Core\Models;

use Illuminate\Database\Eloquent\Model;
use GGPHP\Core\Contracts\Presentable;
use GGPHP\Core\Traits\CastDatetimeFormatTrait;
use GGPHP\Core\Traits\BootPresentTrait;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;


class CoreModel extends Model implements Presentable
{
    use CastDatetimeFormatTrait, LogsActivity, CausesActivity, BootPresentTrait;

    protected static $logFillable = true;
}
