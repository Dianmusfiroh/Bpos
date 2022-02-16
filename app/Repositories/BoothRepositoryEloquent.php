<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\boothRepository;
use App\Entities\Booth;
use App\Validators\BoothValidator;

/**
 * Class BoothRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BoothRepositoryEloquent extends BaseRepository implements BoothRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Booth::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return BoothValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
