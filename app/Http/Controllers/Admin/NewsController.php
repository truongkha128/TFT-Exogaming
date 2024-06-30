<?php

namespace App\Http\Controllers\Admin;

use \App\Http\Controllers\Voyager\VoyagerBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataRestored;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadImagesDeleted;
use TCG\Voyager\Facades\Voyager;
use Auth;
use App\Http\Controllers\Traits\Activable;
use App\Http\Controllers\Traits\LinkedInActivable;
use App\Repositories\Contracts\NewsRepository;
use GuzzleHttp\Client;
use App\Services\LinkedInService;

class NewsController extends VoyagerBaseController
{
    use Activable;
    use LinkedInActivable;

    protected $repository;
    protected $service;

    public function __construct(NewsRepository $repository, LinkedInService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

}