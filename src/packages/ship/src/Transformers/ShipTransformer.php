<?php

namespace GGPHP\Ship\Transformers;

use Illuminate\Support\Arr;
use League\Fractal\TransformerAbstract;

/**
 * Class BaseTransformer.
 *
 * @package namespace App\Transformers;
 */
class ShipTransformer extends TransformerAbstract
{
    use GGPHP\Core\Traits\FillableTransformer;
}
