<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository extends BaseRepository
{
    /**
     * Set Product as Model
     *
     * @var Customer
     */
    public $model = Customer::class;

    /**
     * Store new customer
     *
     * @param  array $data
     * @return Customer
     */
    public function store($data)
    {
        return $this->instance()->create($data);
    }
}
