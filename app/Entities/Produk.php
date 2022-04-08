<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Produk.
 *
 * @package namespace App\Entities;
 */
class Produk extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_produk',
        'id_fee',
        'id_biodata',
        'nama_produk',
        'harga',
        'diskon',
        'stok',
        'image',
        'created_at'
    ];
    protected $table = 't_produk';
    public $timestamps = false;
}
