<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\News;

/**
 * Class NewsTransformer.
 *
 * @package namespace App\Transformers;
 */
class NewsTransformer extends TransformerAbstract
{
    /**
     * Transform the News entity.
     *
     * @param \App\Models\News $model
     *
     * @return array
     */
    public function transform(News $model)
    { 
        $file = isset($model->file) ? json_decode($model->file) : null;
        $file_url = '';
        if (!empty($file)) {
            IF (!empty($file[0]->download_link)) {
                $file_url = url('storage/'.$file[0]->download_link);
            }
        }

        return [
            '_ID'           => (int) $model->id,
            'title'         => $model->title,
            'description'   => $model->description,
            'language'      => $model->language,
            'thumb'         => url('/storage/' . $model->thumb),
            'file'          => $file_url,
            'active'        => (bool)$model->active,
            'category'      => fractal($model->category, new NewsCategoryTransformer()),
            'cct_author_id' => $model->user->id,
            'cct_created'   => $model->created_at,
            'cct_modified'  => $model->updated_at,
        ];
    }
}
