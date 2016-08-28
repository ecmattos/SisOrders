<?php

namespace L52\Presenters;

use L52\Transformers\ClientTypeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ClientTypePresenter
 *
 * @package namespace L52\Presenters;
 */
class ClientTypePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ClientTypeTransformer();
    }
}
