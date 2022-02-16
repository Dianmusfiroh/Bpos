<?php

namespace App\Entities;

use App\Http\Controllers\BoothsController;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class JenisUsaha.
 *
 * @package namespace App\Entities;
 */
class JenisUsaha extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_jenis_usaha',
        'jenis_usaha'
    ];

    protected $table = 't_jenis_usaha';
    public $timestamps = false;

    public function booth()
    {
        return $this->hasMany(BoothsController::class);
    }

}
