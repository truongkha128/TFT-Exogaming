<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;

/**
 * Class Partner.
 *
 * @package namespace App\Models;
 */
class AbstractModel extends Model implements Transformable
{
    use Translatable, TransformableTrait, Resizable;

    public function defaultThumb()
    {
        return '';
    }
}
