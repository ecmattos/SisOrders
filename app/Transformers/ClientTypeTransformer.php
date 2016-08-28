<?php

namespace L52\Transformers;

use League\Fractal\TransformerAbstract;
use L52\Entities\ClientType;

/**
 * Class ClientTypeTransformer
 * @package namespace L52\Transformers;
 */
class ClientTypeTransformer extends TransformerAbstract
{

    /**
     * Transform the \ClientType entity
     * @param \ClientType $model
     *
     * @return array
     */
    public function transform(ClientType $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
