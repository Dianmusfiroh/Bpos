<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class DataBank.
 *
 * @package namespace App\Entities;
 */
class DataBank extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_bank',
        'name',
        'code'
    ];
    protected $table = 'bank';
    public $timestamps = false;

}
