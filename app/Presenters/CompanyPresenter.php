<?php

namespace L52\Presenters;

use L52\Transformers\CompanyTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CompanyPresenter
 *
 * @package namespace L52\Presenters;
 */
class CompanyPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CompanyTransformer();
    }
}
