<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class StatusFee.
 *
 * @package namespace App\Entities;
 */
class StatusFee extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 't_status_bayar_fee';
    protected $fillable = [
        'id_status_bayar_fee',
        'id_biodata',
        'bulan',
        'tahun',
        'status',
        'jumlah_bayar'
    ];

}
