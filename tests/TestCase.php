<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    use DatabaseMigrations;
    use CreatesApplication;

    /**
     * Define Default Model
     *
     * @var string
     */
    protected $model;


    /**
     * Instance of model
     *
     * @var Model
     */
    protected $instance;

    /**
     * Table of instanced model
     *
     * @var string
     */
    protected $table;

    /**
     * Call factory directly
     *
     * @param  mixed $model
     * @param  mixed $data
     * @return Model
     */
    protected function create(string $model, $data = null): Model
    {
        $model = new $model();
        $data = (!empty($data) && count($data)) ? $data : null;

        return $model->factory()->create($data);
    }

    /**
     * Create and authenticate user to run an test
     *
     * @param  mixed $user
     * @return void
     */
    protected function auth($user = null)
    {
        $user = $user ?: $this->create('App\Models\User');

        $this->actingAs($user);

        return $this;
    }

    /**
     * setUp
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        if ($this->model) {
            $this->instance = new $this->model();
            $this->table = $this->instance->getTable();
        }
    }
}
