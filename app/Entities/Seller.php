<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Seller.
 *
 * @package namespace App\Entities;
 */
class Seller extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_setting',
        'nama_toko',
        'email_toko',
        'no_hp_toko',
        'alamat_toko',
        'logo_toko',
        'prov',
        'kab',
        'kec',
        'instagram',
        'whatsapp',
        'facebook',
        'tiktok',
        'youtube',
        'pixel_fb',
        'pixel_google',
        'pixel_tiktok',
        'es_batal',
        'es_hapus',
        'es_selesai',
        'kode_unik',
        'id_user',
        'id_kategori_bisnis'




    ];
    protected $table='t_setting';
    public $timestamps= false;

    public function account()
    {
       return $this->belongsTo(Account::class);
    }

}
