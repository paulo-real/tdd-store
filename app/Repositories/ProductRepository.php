<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository
{
    /**
     * Set Product as Model
     *
     * @var undefined
     */
    public $model = Product::class;

    /**
     * Store new product
     *
     * @param  array $data
     * @return Product
     */
    public function store($data)
    {
        return $this->instance()->create($data);
    }
}
