<?php

namespace App\Repositories;

abstract class BaseRepository
{
    /**
     * Model
     *
     * @var mixed
     */
    protected $model;

    /**
     * Create a instance of a giving model
     *
     * @return void
     */
    protected function instance()
    {
        return app($this->model);
    }
}
