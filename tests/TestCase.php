<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

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
     * Authenticate user to run an test
     *
     * @param  mixed $user
     * @return void
     */
    protected function auth($user = null)
    {
        $user = $user ?: $this->create('App\Models\User');

        return auth()->attempt([
            'email' => $user->email,
            'password' => 'password',
        ]);
    }
}
