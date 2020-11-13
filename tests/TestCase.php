<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

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
