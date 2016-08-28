<?php

namespace L52\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use L52\Repositories\PatrimonialBrandRepository;
use L52\Entities\PatrimonialBrand;
use L52\Validators\PatrimonialBrandValidator;

/**
 * Class PatrimonialBrandRepositoryEloquent
 * @package namespace L52\Repositories;
 */
class PatrimonialBrandRepositoryEloquent extends BaseRepository implements PatrimonialBrandRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PatrimonialBrand::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
