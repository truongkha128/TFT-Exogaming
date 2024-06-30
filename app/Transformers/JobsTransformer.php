<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Jobs;

/**
 * Class JobsTransformer.
 *
 * @package namespace App\Transformers;
 */
class JobsTransformer extends TransformerAbstract
{
    /**
     * Transform the Jobs entity.
     *
     * @param \App\Models\Jobs $model
     *
     * @return array
     */
    public function transform(Jobs $model)
    {
        return [
            '_ID'         => (int) $model->id,
            'title'       => $model->title,
            'position'   => $model->position,
            'location'   => $model->location,
            'type'       => $model->type,
            'date'       => $model->date,
            'language'   => $model->language,
            'active'     => $model->active,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
