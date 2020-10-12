<?php

namespace GGPHP\Ship\Models;

use Illuminate\Database\Eloquent\Model;
use GGPHP\Core\Contracts\Presentable;
use GGPHP\Core\Traits\CastDatetimeFormatTrait;
use GGPHP\Core\Traits\BootPresentTrait;

class ShipModel extends Model implements Presentable
{
    use CastDatetimeFormatTrait, BootPresentTrait;
}
