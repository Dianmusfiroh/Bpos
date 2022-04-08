<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\AdminBank;

/**
 * Class AdminBankTransformer.
 *
 * @package namespace App\Transformers;
 */
class AdminBankTransformer extends TransformerAbstract
{
    /**
     * Transform the AdminBank entity.
     *
     * @param \App\Entities\AdminBank $model
     *
     * @return array
     */
    public function transform(AdminBank $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
