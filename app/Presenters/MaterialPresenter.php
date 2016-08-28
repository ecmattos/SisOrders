<?php

namespace L52\Presenters;

use L52\Transformers\MaterialTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MaterialPresenter
 *
 * @package namespace L52\Presenters;
 */
class MaterialPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MaterialTransformer();
    }
}
