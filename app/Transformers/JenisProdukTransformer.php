<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\JenisProduk;

/**
 * Class JenisProdukTransformer.
 *
 * @package namespace App\Transformers;
 */
class JenisProdukTransformer extends TransformerAbstract
{
    /**
     * Transform the JenisProduk entity.
     *
     * @param \App\Entities\JenisProduk $model
     *
     * @return array
     */
    public function transform(JenisProduk $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
