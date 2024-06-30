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
use App\Repositories\Contracts\WebsiteRepository;

class WebsiteController extends VoyagerBaseController
{
    use Activable;

    public function __construct(WebsiteRepository $repository)
    {
        $this->repository = $repository;
    }
}