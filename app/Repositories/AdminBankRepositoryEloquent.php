<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\adminBankRepository;
use App\Entities\AdminBank;
use App\Validators\AdminBankValidator;

/**
 * Class AdminBankRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AdminBankRepositoryEloquent extends BaseRepository implements AdminBankRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AdminBank::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return AdminBankValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
