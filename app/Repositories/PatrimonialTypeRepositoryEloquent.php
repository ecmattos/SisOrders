<?php

namespace L52\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use L52\Repositories\PatrimonialTypeRepository;
use L52\Entities\PatrimonialType;
use L52\Validators\PatrimonialTypeValidator;

/**
 * Class PatrimonialTypeRepositoryEloquent
 * @package namespace L52\Repositories;
 */
class PatrimonialTypeRepositoryEloquent extends BaseRepository implements PatrimonialTypeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PatrimonialType::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
