<?php

namespace App\Presenters;

use App\Transformers\StatusFeeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class StatusFeePresenter.
 *
 * @package namespace App\Presenters;
 */
class StatusFeePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new StatusFeeTransformer();
    }
}
