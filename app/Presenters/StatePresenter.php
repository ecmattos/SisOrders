<?php

namespace L52\Presenters;

use L52\Transformers\StateTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class StatePresenter
 *
 * @package namespace L52\Presenters;
 */
class StatePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new StateTransformer();
    }
}
