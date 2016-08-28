<?php

namespace L52\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use L52\Repositories\MaterialUnitRepository;
use L52\Entities\MaterialUnit;
use L52\Validators\MaterialUnitValidator;

/**
 * Class MaterialUnitRepositoryEloquent
 * @package namespace L52\Repositories;
 */
class MaterialUnitRepositoryEloquent extends BaseRepository implements MaterialUnitRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MaterialUnit::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
