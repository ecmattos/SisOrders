<?php

namespace L52\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use L52\Repositories\StateRepository;
use L52\Entities\State;
use L52\Validators\StateValidator;

/**
 * Class StateRepositoryEloquent
 * @package namespace L52\Repositories;
 */
class StateRepositoryEloquent extends BaseRepository implements StateRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return State::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return StateValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
