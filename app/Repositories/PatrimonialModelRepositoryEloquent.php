<?php

namespace L52\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use L52\Repositories\PatrimonialModelRepository;
use L52\Entities\PatrimonialModel;
use L52\Validators\PatrimonialModelValidator;

/**
 * Class PatrimonialModelRepositoryEloquent
 * @package namespace L52\Repositories;
 */
class PatrimonialModelRepositoryEloquent extends BaseRepository implements PatrimonialModelRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PatrimonialModel::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
