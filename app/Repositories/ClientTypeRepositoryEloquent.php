<?php

namespace L52\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use L52\Repositories\ClientTypeRepository;
use L52\Entities\ClientType;
#use L52\Validators\ClientTypeValidator;

/**
 * Class ClientTypeRepositoryEloquent
 * @package namespace L52\Repositories;
 */
class ClientTypeRepositoryEloquent extends BaseRepository implements ClientTypeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ClientType::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    Não precisa setar no repository o validator, isos já está sendo feito pelo service.
    public function validator()
    {

        return ClientTypeValidator::class;
    }*/


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
