<?php

namespace App\Http\Controllers\Api\Secured;

use App\Http\Controllers\Api\APIBaseController as BaseController;
use Dingo\Api\Http\Request;

use App\Repositories\UserRepository;
use App\Transformers\UserTransformer;

class UserController extends BaseController
{
    public function __construct(UserRepository $repository, UserTransformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
    }

    public function index(Request $request)
    {
        return parent::index($request);
    }
}
