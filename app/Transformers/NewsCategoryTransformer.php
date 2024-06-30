<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\NewsCategory;

/**
 * Class NewsCategoryTransformer.
 *
 * @package namespace App\Transformers;
 */
class NewsCategoryTransformer extends TransformerAbstract
{
    /**
     * Transform the NewsCategory entity.
     *
     * @param \App\Models\NewsCategory $model
     *
     * @return array
     */
    public function transform(NewsCategory $model)
    {
        return [
            'id'          => (int) $model->id,
            'name'        => (string) $model->name
        ];
    }
}
