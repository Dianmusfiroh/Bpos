<?php

namespace App\Presenters;

use App\Transformers\FeeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class FeePresenter.
 *
 * @package namespace App\Presenters;
 */
class FeePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FeeTransformer();
    }
}
