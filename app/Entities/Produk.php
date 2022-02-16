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
        'id_user',
        'nama_produk',
        'jenis_produk',
        'harga_jual',
        'berat',
        'gambar',
        'deskripsi',
        'is_active',
        'status',
        'created'
    ];
    protected $table = 't_produk';
    public $timestamps = false;
}
