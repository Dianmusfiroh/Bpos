<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class AdminBank.
 *
 * @package namespace App\Entities;
 */
class AdminBank extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 't_admin_bank';
    public $timestamps = false;
    protected $fillable = [
        'id_admin_bank',
        'nama_pemilik',
        'no_rekening',
        'nama_bank'
    ];

}
