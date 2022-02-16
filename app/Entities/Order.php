<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Order.
 *
 * @package namespace App\Entities;
 */
class Order extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_order',
        'order_id',
        'id_produk',
        'nama_produk',
        'harga_jual',
        'berat',
        'gambar_produk',
        'jenis_produk',
        'nama_pembeli',
        'alamat_pembeli',
        'no_hp_pembeli',
        'email_pembeli',
        'prov',
        'kab',
        'kec',
        'qty',
        'varian',
        'ukuran',
        'expedisi',
        'estimasi',
        'paket',
        'ongkir',
        'status_bayar',
        'order_status',
        'is_created',
        'tgl_order',
        'tgl_proses',
        'tgl_kirim',
        'tgl_selesai',
        'kupon',
        'potongan',
        'total',
        'totalbayar',
        'bank',
        'payment',
        'no_resi',
        'id_user'
        


    ];
    protected $table = 't_order';
    public $timestamps= false;

}
