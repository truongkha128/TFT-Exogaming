<?php

namespace App\Http\Controllers\Admin;

use \App\Http\Controllers\Voyager\VoyagerBaseController;
use Illuminate\Http\Request;
use View;
use App\Repositories\Contracts\ContactRepository;

class ContactController extends VoyagerBaseController
{

    public function __construct(ContactRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request) 
    {
    	return parent::index($request);
    }
}