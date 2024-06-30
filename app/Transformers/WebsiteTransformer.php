<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Website;

/**
 * Class WebsiteTransformer.
 *
 * @package namespace App\Transformers;
 */
class WebsiteTransformer extends TransformerAbstract
{
    /**
     * Transform the Website entity.
     *
     * @param \App\Models\Website $model
     *
     * @return array
     */
    public function transform(Website $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
