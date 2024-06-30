<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\EncountersRepository;
use App\Models\encounters;
use App\Validators\ItemsValidator;

/**
 * Class TraitsRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class EncountersRepositoryEloquent extends BaseRepository implements EncountersRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return encounters::class;    
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getEncountersAll()
    {
        return $this->model->where('active', 1)->get();
    }
    
}
