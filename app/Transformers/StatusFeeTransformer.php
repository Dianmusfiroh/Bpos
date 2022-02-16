<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\StatusFee;

/**
 * Class StatusFeeTransformer.
 *
 * @package namespace App\Transformers;
 */
class StatusFeeTransformer extends TransformerAbstract
{
    /**
     * Transform the StatusFee entity.
     *
     * @param \App\Entities\StatusFee $model
     *
     * @return array
     */
    public function transform(StatusFee $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
