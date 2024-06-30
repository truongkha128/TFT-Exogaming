<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\WatchesRepository;
use App\Models\watches;
use App\Validators\ItemsValidator;

/**
 * Class TraitsRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class WatchesRepositoryEloquent extends BaseRepository implements WatchesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return watches::class;    
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getwatchAll()
    {
        return $this->model->where('active', 1)->get();
    }
    
}
