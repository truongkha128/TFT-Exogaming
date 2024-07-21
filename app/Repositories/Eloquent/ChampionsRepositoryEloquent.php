<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\ChampionsRepository;
use App\Models\Champions;
use App\Validators\ItemsValidator;

/**
 * Class TraitsRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class ChampionsRepositoryEloquent extends BaseRepository implements ChampionsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Champions::class;    
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getChampionsFist($id)
    {
        return $this->model->active()->where('id', $id)->with('trait','item')->first();
    }

    public function getChampionsAll()
    {
        return $this->model->where('active', 1)->with('trait')->get();
    }

    public function getTypeChampions($type)
    {
        return $this->model->active()->where('type', $type)->with('trait')->get();
    }
    
}
