<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Consts;

class CustomerRepository extends BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = new Customer();
    }


}
