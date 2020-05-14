<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;
use App\Traits\DatatableTrait;

use App\Models\User;
use App\Validators\UserValidator;

class UserRepository extends BaseRepository implements CacheableInterface
{
    use CacheableRepository, DatatableTrait;

    protected $cacheExcept = [];

    /*
     * Specify the validator class name
     *
     * @return string
     */
    public function validator()
    {
        return UserValidator::class;
    }

    /*
     * Specify the model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }
}
