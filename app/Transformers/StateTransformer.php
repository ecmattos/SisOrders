<?php

namespace L52\Transformers;

use League\Fractal\TransformerAbstract;
use L52\Entities\State;

/**
 * Class StateTransformer
 * @package namespace L52\Transformers;
 */
class StateTransformer extends TransformerAbstract
{

    /**
     * Transform the \State entity
     * @param \State $model
     *
     * @return array
     */
    public function transform(State $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
