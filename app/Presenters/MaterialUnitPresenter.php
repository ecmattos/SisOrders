<?php

namespace L52\Presenters;

use L52\Transformers\MaterialUnitTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MaterialUnitPresenter
 *
 * @package namespace L52\Presenters;
 */
class MaterialUnitPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MaterialUnitTransformer();
    }
}
