<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Biodata.
 *
 * @package namespace App\Entities;
 */
class Biodata extends Model implements Transformable
{
    use TransformableTrait;

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

    protected $table = 't_biodata';
    public $timestamps = false;
    public function jenisUsaha()
    {
        return $this->belongsTo(JenisUsaha::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }
}
