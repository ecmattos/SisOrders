<?php

namespace L52\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use L52\Repositories\PatrimonialRepository;
use L52\Entities\Patrimonial;
use L52\Validators\PatrimonialValidator;

/**
 * Class PatrimonialRepositoryEloquent
 * @package namespace L52\Repositories;
 */
class PatrimonialRepositoryEloquent extends BaseRepository implements PatrimonialRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Patrimonial::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
