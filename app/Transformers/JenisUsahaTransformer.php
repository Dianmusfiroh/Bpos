<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\JenisUsaha;

/**
 * Class JenisUsahaTransformer.
 *
 * @package namespace App\Transformers;
 */
class JenisUsahaTransformer extends TransformerAbstract
{
    /**
     * Transform the JenisUsaha entity.
     *
     * @param \App\Entities\JenisUsaha $model
     *
     * @return array
     */
    public function transform(JenisUsaha $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
