<?php

namespace App\Presenters;

use App\Transformers\JenisUsahaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class JenisUsahaPresenter.
 *
 * @package namespace App\Presenters;
 */
class JenisUsahaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new JenisUsahaTransformer();
    }
}
