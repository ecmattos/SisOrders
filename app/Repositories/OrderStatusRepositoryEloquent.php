<?php

namespace L52\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use L52\Repositories\OrderStatusRepository;
use L52\Entities\OrderStatus;
use L52\Validators\OrderStatusValidator;

/**
 * Class OrderStatusRepositoryEloquent
 * @package namespace L52\Repositories;
 */
class OrderStatusRepositoryEloquent extends BaseRepository implements OrderStatusRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrderStatus::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
