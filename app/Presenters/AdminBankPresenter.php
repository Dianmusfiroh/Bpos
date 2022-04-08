<?php

namespace App\Presenters;

use App\Transformers\AdminBankTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AdminBankPresenter.
 *
 * @package namespace App\Presenters;
 */
class AdminBankPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AdminBankTransformer();
    }
}
