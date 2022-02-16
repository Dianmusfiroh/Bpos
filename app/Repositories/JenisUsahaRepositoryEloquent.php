<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\jenisUsahaRepository;
use App\Entities\JenisUsaha;
use App\Validators\JenisUsahaValidator;

/**
 * Class JenisUsahaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class JenisUsahaRepositoryEloquent extends BaseRepository implements JenisUsahaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return JenisUsaha::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return JenisUsahaValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
