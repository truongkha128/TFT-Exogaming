<?php

namespace App\Http\Controllers\Admin;

use \App\Http\Controllers\Voyager\VoyagerBaseController;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Traits\Activable;
use App\Services\LinkedInService;

class LinkedInController extends VoyagerBaseController
{
    use Activable;

    protected $service;

    public function __construct(LinkedInService $service)
    {
        $this->service = $service;
    }

    public function linkedinCallback(Request $request)
    {
        $user = Auth::user();
        return $this->service->handleLinkedInCallback($user, $request);
    }
}