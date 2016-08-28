<?php

namespace L52\Transformers;

use League\Fractal\TransformerAbstract;
use L52\Entities\City;

/**
 * Class CityTransformer
 * @package namespace L52\Transformers;
 */
class CityTransformer extends TransformerAbstract
{

    /**
     * Transform the \City entity
     * @param \City $model
     *
     * @return array
     */
    public function transform(City $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
