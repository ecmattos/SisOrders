<?php

namespace L52\Transformers;

use League\Fractal\TransformerAbstract;
use L52\Entities\Client;

/**
 * Class ClientTransformer
 * @package namespace L52\Transformers;
 */
class ClientTransformer extends TransformerAbstract
{

    /**
     * Transform the \Client entity
     * @param \Client $model
     *
     * @return array
     */
    public function transform(Client $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
