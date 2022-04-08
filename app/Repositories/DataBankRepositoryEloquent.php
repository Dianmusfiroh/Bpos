<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\dataBankRepository;
use App\Entities\DataBank;
use App\Validators\DataBankValidator;

/**
 * Class DataBankRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DataBankRepositoryEloquent extends BaseRepository implements DataBankRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DataBank::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return DataBankValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
