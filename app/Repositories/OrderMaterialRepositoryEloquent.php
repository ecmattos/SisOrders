<?php

namespace L52\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use L52\Repositories\OrderMaterialRepository;
use L52\Entities\OrderMaterial;
#use L52\Validators\OrderMaterialValidator;

/**
 * Class OrderMaterialRepositoryEloquent
 * @package namespace L52\Repositories;
 */
class OrderMaterialRepositoryEloquent extends BaseRepository implements OrderMaterialRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrderMaterial::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
