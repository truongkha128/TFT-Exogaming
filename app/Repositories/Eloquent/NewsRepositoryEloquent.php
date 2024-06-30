<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\NewsRepository;
use App\Models\News;
use App\Validators\NewsValidator;

/**
 * Class NewsRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class NewsRepositoryEloquent extends BaseRepository implements NewsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return News::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function filter($request)
    {
        $perPage = $request->input('_limit', 10);
        $page = $request->input('_offset');
        $lang = $request->input('language');
        $website = $request->input('website');
        $category_id = $request->input('category_id');
        $search = $request->input('cct_search');
        $search_by = $request->input('cct_search_by');

        $query = News::active()->with('category', 'user');
        if ($lang) {
            $query->where('language', $lang);
        }

        if ($website) {
            $query->whereHas('websites', function ($query) use($website){
                $query->where('domain', $website);
            });
        }

        if ($search && $search_by == 'website') {
            $query->whereHas('websites', function ($query) use($search){
                $query->where('domain', $search);
            });
        }

        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        $query->orderByDesc('id');

        return $query->paginate($perPage);
    }

    public function getNewsByID($id)
    {
        return News::find($id);
    }
}
