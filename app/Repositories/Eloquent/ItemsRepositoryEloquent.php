<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\ItemsRepository;
use App\Models\Items;
use App\Validators\ItemsValidator;

/**
 * Class ItemsRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class ItemsRepositoryEloquent extends BaseRepository implements ItemsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Items::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getItemsAll()
    {
        return $this->model->where('active', 1)->get();
    }

    public function getItemsFist($id)
    {
        return $this->model->active()->where('id', $id)->first();
    }

    public function getTypeItems($type)
    {
        return $this->model->active()->where('type', $type)->get();
    }
}
