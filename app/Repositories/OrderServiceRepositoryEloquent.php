<?php

namespace L52\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use L52\Repositories\OrderServiceRepository;
use L52\Entities\OrderService;
#use L52\Validators\OrderServiceValidator;

/**
 * Class OrderServiceRepositoryEloquent
 * @package namespace L52\Repositories;
 */
class OrderServiceRepositoryEloquent extends BaseRepository implements OrderServiceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrderService::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
