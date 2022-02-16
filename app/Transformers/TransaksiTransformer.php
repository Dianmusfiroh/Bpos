<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Transaksi;

/**
 * Class TransaksiTransformer.
 *
 * @package namespace App\Transformers;
 */
class TransaksiTransformer extends TransformerAbstract
{
    /**
     * Transform the Transaksi entity.
     *
     * @param \App\Entities\Transaksi $model
     *
     * @return array
     */
    public function transform(Transaksi $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
