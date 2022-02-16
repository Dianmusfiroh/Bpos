<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Booth;

/**
 * Class BoothTransformer.
 *
 * @package namespace App\Transformers;
 */
class BoothTransformer extends TransformerAbstract
{
    /**
     * Transform the Booth entity.
     *
     * @param \App\Entities\Booth $model
     *
     * @return array
     */
    public function transform(Booth $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
