<?php

namespace L52\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use L52\Repositories\PatrimonialSubTypeRepository;
use L52\Entities\PatrimonialSubType;
use L52\Validators\PatrimonialSubTypeValidator;

/**
 * Class PatrimonialSubTypeRepositoryEloquent
 * @package namespace L52\Repositories;
 */
class PatrimonialSubTypeRepositoryEloquent extends BaseRepository implements PatrimonialSubTypeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PatrimonialSubType::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
