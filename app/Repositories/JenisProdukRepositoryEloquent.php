<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\jenis_produkRepository;
use App\Entities\JenisProduk;
use App\Validators\JenisProdukValidator;

/**
 * Class JenisProdukRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class JenisProdukRepositoryEloquent extends BaseRepository implements JenisProdukRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return JenisProduk::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return JenisProdukValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
