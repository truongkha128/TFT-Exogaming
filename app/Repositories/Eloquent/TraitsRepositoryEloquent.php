<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\TraitsRepository;
use App\Models\Traits;
use App\Validators\ItemsValidator;

/**
 * Class TraitsRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class TraitsRepositoryEloquent extends BaseRepository implements TraitsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Traits::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getTraitFist($id)
    {
        return $this->model->active()->where('id', $id)->first();
    }

    public function getTraitsAll()
    {
        return $this->model->where('active', 1)->get();
    }

    public function getTypeTraits($type)
    {
        return $this->model->active()->where('type', $type)->get();
    }
}
