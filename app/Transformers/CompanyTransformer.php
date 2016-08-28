<?php

namespace L52\Transformers;

use League\Fractal\TransformerAbstract;
use L52\Entities\Company;

/**
 * Class CompanyTransformer
 * @package namespace L52\Transformers;
 */
class CompanyTransformer extends TransformerAbstract
{

    /**
     * Transform the \Company entity
     * @param \Company $model
     *
     * @return array
     */
    public function transform(Company $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
