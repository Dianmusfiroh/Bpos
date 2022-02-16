<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\statusFeeRepository;
use App\Entities\StatusFee;
use App\Validators\StatusFeeValidator;

/**
 * Class StatusFeeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class StatusFeeRepositoryEloquent extends BaseRepository implements StatusFeeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return StatusFee::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return StatusFeeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
