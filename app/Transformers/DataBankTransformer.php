<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\DataBank;

/**
 * Class DataBankTransformer.
 *
 * @package namespace App\Transformers;
 */
class DataBankTransformer extends TransformerAbstract
{
    /**
     * Transform the DataBank entity.
     *
     * @param \App\Entities\DataBank $model
     *
     * @return array
     */
    public function transform(DataBank $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
