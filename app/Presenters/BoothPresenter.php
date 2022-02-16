<?php

namespace App\Presenters;

use App\Transformers\BoothTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BoothPresenter.
 *
 * @package namespace App\Presenters;
 */
class BoothPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BoothTransformer();
    }
}
