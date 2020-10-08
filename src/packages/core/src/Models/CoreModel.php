<?php

namespace GGPHP\Core\Models;

use Illuminate\Database\Eloquent\Model;
use GGPHP\Core\Contracts\Presentable;
use GGPHP\Core\Traits\CastDatetimeFormatTrait;
use GGPHP\Core\Traits\BootPresentTrait;

class CoreModel extends Model implements Presentable
{
    use CastDatetimeFormatTrait, BootPresentTrait;
}
