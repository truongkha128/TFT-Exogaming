<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\AugmentsRepository;
use App\Models\Augments;
use App\Validators\ItemsValidator;

/**
 * Class TraitsRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class AugmentsRepositoryEloquent extends BaseRepository implements AugmentsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Augments::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getAugmentsAll()
    {
        return $this->model->where('active', 1)->get();
    }

    public function getTypeAugments($type)
    {
        return $this->model->active()->where('type', $type)->get();
    }

}
