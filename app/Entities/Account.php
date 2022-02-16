<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Account.
 *
 * @package namespace App\Entities;
 */
class Account extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user',
        'username',
        'password',
        'nama_lengkap	',
        'email',
        'no_hp',
        'alamat',
        'user_id',
        'produk_id',
        'is_active',
        'is_created'
        

    ];
    protected $table = 't_user';
    public $timestamps = false ; 

    public function seller()
    {
       return $this->hasMany(Seller::class);
    }
}
