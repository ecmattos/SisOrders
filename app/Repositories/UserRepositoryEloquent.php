<?php

namespace L52\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use L52\Repositories\UserRepository;
use L52\Entities\User;
#use L52\Validators\UserValidator;

/**
 * Class UserRepositoryEloquent
 * @package namespace L52\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    Não precisa setar no repository o validator, isos já está sendo feito pelo service.
    public function validator()
    {

        return UserValidator::class;
    }*/


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
