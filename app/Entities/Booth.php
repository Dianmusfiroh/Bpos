<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Booth.
 *
 * @package namespace App\Entities;
 */
class Booth extends Model implements Transformable
{
    use HasFactory,TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_biodata',
        'nama_toko',
        'id_jenis_usaha',
        'alamat',
        'email',
        'no_hp',
        'image',
        'status_toko'


    ];
    protected $primaryKey = 'id_biodata';

    protected $table='t_biodata';
    public $timestamps = false;

    public function transaksi()
    {
       return $this->hasMany(Transaksi::class);
    }
    public function jenisUsaha(){

        return $this->belongsTo(JenisUsaha::class);

    }


}
