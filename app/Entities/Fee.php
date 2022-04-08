<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Fee.
 *
 * @package namespace App\Entities;
 */
class Fee extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id_fee';
    protected $table = 't_fee';
    protected $fillable = [
        'id_fee',
        'fee'
    ];
    public $timestamps = false;

}
