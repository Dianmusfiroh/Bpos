<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Fee;

/**
 * Class FeeTransformer.
 *
 * @package namespace App\Transformers;
 */
class FeeTransformer extends TransformerAbstract
{
    /**
     * Transform the Fee entity.
     *
     * @param \App\Entities\Fee $model
     *
     * @return array
     */
    public function transform(Fee $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
