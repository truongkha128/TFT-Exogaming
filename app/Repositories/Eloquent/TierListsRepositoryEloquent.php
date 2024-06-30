<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\TierListsRepository;
use App\Models\Tierlists;
use App\Validators\ItemsValidator;

/**
 * Class TraitsRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class TierListsRepositoryEloquent extends BaseRepository implements TierListsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Tierlists::class;    
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getTierList()
    {
        return $this->model->where('active', 1)->with('tierlists_champion')->get();
    }

    public function getTierListFist($id)
    {
        return $this->model->active()->where('id', $id)->with('tierlists_champion','tierlists_early','tierlists_item','tierlists_augment')->first();
    }
}
