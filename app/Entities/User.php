<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class User.
 *
 * @package namespace App\Entities;
 */
class User extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user',
        'id_biodata',
        'username',
        'password',
        'nama_lengkap',
        'no_hp',
        'level',
        'status',
        'shift',
        'date_created',

    ];

    protected $table = 't_user';
    public $timestamps = false;
    public function biodata(){
        return $this->belongsTo(Biodata::class);
    }

}
