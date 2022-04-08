<?php

namespace App\Presenters;

use App\Transformers\DataBankTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DataBankPresenter.
 *
 * @package namespace App\Presenters;
 */
class DataBankPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new DataBankTransformer();
    }
}
