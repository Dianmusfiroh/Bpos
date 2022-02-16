<?php

namespace App\Entities;

use App\Http\Controllers\BoothsController;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Transaksi.
 *
 * @package namespace App\Entities;
 */
class Transaksi extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_transaksi',
        'id_produk',
        'id_user',
        'id_biodata',
        'no_transaksi',
        'nama_pembeli',
        'no_hp_pembeli',
        'nama_produk',
        'harga',
        'image',
        'qty',
        'diskon_transaksi',
        'diskon_produk',
        'sub_total',
        'total_bayar',
        'nominal',
        'kembalian',
        'tgl_transaksi',
        'fee',
        'met_pem',
        'tipe_order',
        'created_at'

    ];

    protected $table = 't_transaksi';
    public $timestamps = false;

    public function booth()
    {
       return $this->belongsTo(BoothsController::class);
    }
}
