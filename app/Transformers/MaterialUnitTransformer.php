<?php

namespace L52\Transformers;

use League\Fractal\TransformerAbstract;
use L52\Entities\MaterialUnit;

/**
 * Class MaterialUnitTransformer
 * @package namespace L52\Transformers;
 */
class MaterialUnitTransformer extends TransformerAbstract
{

    /**
     * Transform the \MaterialUnit entity
     * @param \MaterialUnit $model
     *
     * @return array
     */
    public function transform(MaterialUnit $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
