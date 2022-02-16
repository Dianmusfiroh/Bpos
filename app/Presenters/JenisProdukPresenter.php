<?php

namespace App\Presenters;

use App\Transformers\JenisProdukTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class JenisProdukPresenter.
 *
 * @package namespace App\Presenters;
 */
class JenisProdukPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new JenisProdukTransformer();
    }
}
