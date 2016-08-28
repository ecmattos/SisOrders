<?php

namespace L52\Presenters;

use L52\Transformers\CityTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CityPresenter
 *
 * @package namespace L52\Presenters;
 */
class CityPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CityTransformer();
    }
}
